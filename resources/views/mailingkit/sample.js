function KitDeliverRequestDate(){
	var is_collect_request_time_selectable = true;
	this.set_is_collect_request_time_selectable = function(b){
		is_collect_request_time_selectable = b;
	};
	this.get_is_collect_request_time_selectable = function(){
		return is_collect_request_time_selectable;
	};
	var fetching_request_calendar_basis = false;
	var fetching_collect_calendar_basis = false;
	var createdate = function(year, month, date, hour, minute){
		var d = new Date();
		d.setYear(d.getFullYear() + year);
		d.setMonth(d.getMonth() + month);
		d.setDate(d.getDate() + date);
		d.setHours(d.getHours() + hour);
		d.setMinutes(d.getMinutes() + minute);
		return d;
	};
	var kit_deliver_request_date = {'startDate':createdate(0, 0, 5, 0, 0), 'endDate':createdate(0, 0, 5 + get_kit_dates_max(), 0, 0), 'disableDates':[]};
	var collect_request_date = {'startDate':createdate(0, 0, 5, 0, 0), 'endDate':createdate(0, 0, 5 + get_collect_dates_max(), 0, 0), 'disableDates':[]};
	this.get_collect_request_date_min = function(){
		var dd = CloudCalendar.copydate(collect_request_date.startDate);
		for (var i = 0; i < 20; i++){
			if (!collect_request_date.disableDates.some(function(d){
				return CloudCalendar.dateequal(d, dd);
				})){
				return dd;
			}
			else {
				dd.setDate(dd.getDate() + 1);
			}
		}
		return collect_request_date.startDate;
	};
	this.get_collect_request_date_max = function(){
		var dd = CloudCalendar.copydate(collect_request_date.endDate);
		for (var i = 0; i < 20; i++){
			if (!collect_request_date.disableDates.some(function(d){
				return CloudCalendar.dateequal(d, dd);
				})){
				return dd;
			}
			else {
				dd.setDate(dd.getDate() - 1);
			}
		}
		return collect_request_date.endDate;
	};
	this.get_collect_request_date_max = function(){ return collect_request_date.endDate; };
	var request_calendar_basis_changed = function(zip, fetched){
		fetching_request_calendar_basis = true;

		fetchingrequestcalendarphp = true;
		$.ajax({
			type:'get',
			url:'calendar.php',
			data:{'mode':'get_kit_deliver_request_date_range', 'zip':zip},
			dataType:'json',
			success:function(json, textStatus, jqXHR){
				fetchingrequestcalendarphp = false;
				if (json.status === 'Success'){
					kit_deliver_request_date.startDate = new Date(json.startDate.replace(/,/g, '/'));
					kit_deliver_request_date.endDate = new Date(json.endDate.replace(/,/g, '/'));
					kit_deliver_request_date.disableDates = json.disableDates.map(function(d){ return new Date(d.replace(/,/g, '/'));});
				}
				if (json.status === 'Error'){
					kit_deliver_request_date = {'startDate':createdate(0, 0, 5, 0, 0), 'endDate':createdate(0, 0, 5 + get_kit_dates_max(), 0, 0), 'disableDates':kit_workday_exclusion_dates().map(function(d){ return new Date(d);})};
				}
				fetched(json);
			},
			error:function(jqXHR, textStatus){
			},
			complete:function(jqXHR, textStatus){
				fetching_request_calendar_basis = false;
			},
		});
	};
	var collect_calendar_basis_changed = function(zip, requestdate, requesttime, fetched){
		fetching_collect_calendar_basis = true;
		fetchingcollectcalendarphp = true;
		$.getJSON('calendar.php', {'mode':'get_collect_request_date_range', 'zip':zip, 'kit_deliver_request_date':requestdate, 'kit_deliver_request_time_kind':requesttime}, function(json){
			fetchingcollectcalendarphp = false;
			fetching_collect_calendar_basis = false;
			if (json.status === 'Success'){
				collect_request_date.startDate = new Date(json.startDate.replace(/,/g, '/'));
				collect_request_date.endDate = new Date(json.endDate.replace(/,/g, '/'));
				collect_request_date.disableDates = json.disableDates.map(function(d){ return new Date(d.replace(/,/g, '/'));});
			}
			if (json.status === 'Error'){
				if ($('input[name=kit_deliver_request_date]').val()){
					var d = new Date($('input[name=kit_deliver_request_date]').val().replace(/[年月]/g, '/').replace(/日/, ''));
					var sd = CloudCalendar.copydate(d);
					sd.setDate(sd.getDate() + 1);
					var ed = CloudCalendar.copydate(d);
					ed.setDate(ed.getDate() + get_collect_dates_max());
					collect_request_date = {'startDate':sd, 'endDate':ed, 'disableDates':collect_exclusion_dates().map(function(d){ return new Date(d);})};
				}
				else {
					collect_request_date = {'startDate':createdate(0, 0, 5, 0, 0), 'endDate':createdate(0, 0, 5 + get_collect_dates_max(), 0, 0), 'disableDates':collect_exclusion_dates().map(function(d){ return new Date(d);})};
				}
			}
			fetched(json);
		});
	};
	this.get_request_cloudcalendar = function(fetched, clicked){
		var timerid = setInterval(function(){
			if (!fetching_request_calendar_basis){
				fetched(new CloudCalendar(kit_deliver_request_date.startDate, kit_deliver_request_date.endDate, kit_deliver_request_date.disableDates, function(val){
					clicked(val);
				}));
				clearInterval(timerid);
				timerid = 0;
			}
		}, 100);
	};
	this.get_collect_cloudcalendar = function(fetched, clicked){
		var timerid = setInterval(function(){
			if (!fetching_collect_calendar_basis){
				fetched(new CloudCalendar(collect_request_date.startDate, collect_request_date.endDate, collect_request_date.disableDates, function(){
					clicked();
				}));
				clearInterval(timerid);
				timerid = 0;
			}
		}, 100);
	};
	var lastkitcount = 0;
	var lastzip = '';
	var lastrequestdate = '';
	var lastrequesttime = '';
	var val_changed = function(kitcount, zip, requestdate, requesttime, callback){
		var flg0 = false;
		var flg1 = false;
		if (lastzip !== zip){
			flg0 = true;
			flg1 = true;
		}
		if (lastkitcount !== kitcount){
			flg0 = true;
			flg1 = true;
		}
		if (lastrequestdate !== requestdate){
			flg1 = true;
		}
		if (lastrequesttime !== requesttime){
			flg1 = true;
		}
		if (flg0){
			request_calendar_basis_changed(zip, function(json){
				callback(json);
			});
		}
		if (flg1){
			collect_calendar_basis_changed(zip, requestdate, requesttime, function(json){
				callback(json);
			});
		}
		lastkitcount = kitcount;
		lastzip = zip;
		lastrequestdate = requestdate;
		lastrequesttime = requesttime;
	};
	this.kit_request_changed = val_changed;
	this.zip_changed = function(kitcount, zip, requestdate, requesttime, callback, do_not_collect_callback){
		$.getJSON('do_not_collect_area.php', {'zip':zip}, function(json){
			do_not_collect_callback(json);
		});
		val_changed(kitcount, zip, requestdate, requesttime, callback);
	};
	this.request_date_changed = val_changed;
}
var fetchingcollectcalendarphp = false;
var fetchingrequestcalendarphp = false;
var fetchingaddresssearchajaxphp = false;
KitDeliverRequestDate.fetchingcalendarphp = function(){
	return fetchingcollectcalendarphp || fetchingrequestcalendarphp || fetchingaddresssearchajaxphp;
}
function CloudCalendar(startd, endd, disable, calendarclicked){
	var getfirstweekday = function(date){
		if (date.getDay() === 0){
			return date;
		}
		var d = CloudCalendar.copydate(date);
		d.setDate(d.getDate() - 1);
		return getfirstweekday(d);
	}
	var getthead = function(){
		var tr = $('<tr>');
		['日', '月', '火', '水', '木', '金', '土'].forEach(function(e){
			$(tr).append($('<th>').html(e));
		});
		var thead = $('<thead>').append(tr);
		return thead;
	}
	var getCalendarHtml1 = function(toinput, year, month, clicked){
		var tbody = $('<tbody>');
		var d = getfirstweekday(new Date(year, month, 1));
		var appended1 = false;
		var finished = false;
		var firsttd = true;
		while (!finished){
			var tr = $('<tr>');
			for (var j = 0; j < 7; j++){
				var ataghtml = d.getDate();
				if (d.getDate() === 1){
					if (appended1){
						finished = true;
					}
					else {
						appended1 = true;
					}
				}
				var tdclasses = ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
				var td = $('<td>').addClass(tdclasses[d.getDay()]);
				if ((d.getFullYear() === year) && (d.getMonth() === month)){
					if ((d < startd) || (d > endd) || disable.some(function(dd){ return CloudCalendar.dateequal(dd, d);})){
						$(td).append($('<span>').addClass('past').html(ataghtml));
					}
					else {
						$(td).append($('<a>').attr({'href':'javascript:void(0)', 'data-date': CloudCalendar.formatdate(d)}).html(ataghtml).click(function(eventdata){
							$(toinput).val($(this).attr('data-date'));
							clicked(eventdata, $(this).attr('data-date'));
						}));
					}
				}
				else {
					$(td).addClass('blankspan');
				}
				d.setDate(d.getDate() + 1);
				$(tr).append(td);
				firsttd = false;
			}
			$(tbody).append(tr);
		}
		var spanyear = $('<span>').addClass('spanyear').html(year + '年');
		var spanmonth = $('<span>').addClass('spanmonth').html((month+1) + '月');
		var today = new Date();
		var caption = $('<caption>').append(spanyear).append(spanmonth);
		var table = $('<table>').append(caption).append(getthead()).append(tbody);
		return table;
	};
	var getCalendarHtml = function(toinput, clicked){
		var tbody = $('<tbody>');
		var d = getfirstweekday(new Date());
		var weeks = 2;
		for (var i = 0; i < weeks; i++){
			var tr = $('<tr>');
			for (var j = 0; j < 7; j++){
				var ataghtml = d.getDate();
				if (d.getDate() === 1){
					ataghtml = (d.getMonth()+1) + '/' + d.getDate();
				}
				if ((i === 0) && (j === 0)){
					ataghtml = (d.getMonth()+1) + '/' + d.getDate();
				}
				var atag = $('<a>').attr({'href':'javascript:void(0)', 'data-date': CloudCalendar.formatdate(d)}).html(ataghtml).click(function(eventdata){
					$(toinput).val($(this).attr('data-date'));
					clicked(eventdata);
				});
				var td = $('<td>').append(atag);
				d.setDate(d.getDate() + 1);
				$(tr).append(td);
			}
			$(tbody).append(tr);
		}
		var table = $('<table>').append(getthead()).append(tbody);
		return table;
	};
	var div = $('<div>').addClass('cloudcalendar').addClass('lastcalendar');
	this.show = function(appendto, toinput){
		setTimeout(function(){
			$('.cloudcalendar').remove();
			$('.calendarcloser').remove();
			var year = startd.getFullYear();
			var month = startd.getMonth();
			var tableclassname = 'lastcalendar';

			var main_area = $('<div>').addClass('main_area');
			$(div).addClass('cloudcalendar').append(main_area);
			for (var i = 0; (i < 2) && ((new Date(year, month, 1)) < endd); i++){
				var calendarhtml0 = getCalendarHtml1(toinput, year, month, function(eventdata, val){
					eventdata.bubbles = false;
					$(calendarcloser).remove();
					$(div).remove();

					// 引取希望日のバリデーションチェック
					$(toinput).validationEngine('validate');

					calendarclicked(val);
				}).addClass(tableclassname);

				$(main_area).append(calendarhtml0);
				month++;
				if (month > 11){
					month = 0;
					year++;
				}
				tableclassname = 'nextcalendar';
			}
			var nextbutton = $('<a>').html('翌月').addClass('nextbutton calendarbutton').attr({'href':'javascript:void(0)'}).click(function(){
				$(div).removeClass('lastcalendar').addClass('nextcalendar');
			});
			var lastbutton = $('<a>').html('前月').addClass('lastbutton calendarbutton').attr({'href':'javascript:void(0)'}).click(function(){
				$(div).removeClass('nextcalendar').addClass('lastcalendar');
			});
			var calendar_top_area = $('<div>').addClass('calendar_top_area').append(nextbutton).append(lastbutton);
			if (($('table', div).length > 1)){
				$(div).prepend(calendar_top_area);
			}
			$(appendto).append(div);
			var calendarcloser = $('<div>').addClass('calendarcloser');
			$(calendarcloser).click(function(){
				$(this).remove();
				$(div).remove();
			});
			$('body').append(calendarcloser);
		}, 0);
	};
}
CloudCalendar.copydate = function(date){
	return new Date(date.getFullYear(), date.getMonth(), date.getDate(), date.getHours(), date.getMinutes(), date.getSeconds(), date.getMilliseconds());
}
CloudCalendar.dateequal = function(d0, d1){
	return (d0.getFullYear() === d1.getFullYear()) && (d0.getMonth() === d1.getMonth()) && (d0.getDate() === d1.getDate());
}
CloudCalendar.spp = function(){
	var ua = navigator.userAgent;
	if (ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) {
		return true;
	} else if (ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0) {
		return false;
		  // タブレット用コード
	} else {
		return false;
		  // PC用コード
	}
	return false;
}
CloudCalendar.formatdate = function(d){
	return d.getFullYear() + '年' + (d.getMonth()+1) + '月' + d.getDate() + '日';
};

function GetDateFromJ(s){
	return new Date(s.replace(GetDateFromJ.reg, '$1')*1, s.replace(GetDateFromJ.reg, '$2')*1-1, s.replace(GetDateFromJ.reg, '$3')*1);
}
GetDateFromJ.reg = /([0-9][0-9][0-9][0-9]).?([0-9][0-9]).?([0-9][0-9]).?/;
function checkDates(e){
	var d0 = $('#kit_deliver_request_date').val();
	if (GetDateFromJ.reg.test(d0)){
		var d1 = $(e[0]).val();
		if (GetDateFromJ.reg.test(d1)){
			if (d0 === d1){
				var time_kind = $('input[name=kit_deliver_request_time_kind]:checked').val()*1;
				return (time_kind === 2) ? true : "＊ お届け希望日と引取希望日が同じ場合はお届け希望時間帯を午前中を選択してください";
			} else {
				return (d1 < d0) ? "＊ 引取希望日はお届け希望日より後で指定してください" : true;
			}
		}
	}
}

function checkPrefectureKind(e){
	// optionの選択不可状態を一時的に外して値を取得する
	$('select[name="prefecture_kind"]').children().removeAttr('disabled');
	var prefecture_kind = $('select[name="prefecture_kind"]').val();
	$('select[name="prefecture_kind"]').children('[value="47"]').attr('disabled', true);

	return (prefecture_kind == '47') ? '＊ 沖縄県からのお申込み受付は終了いたしました' : true;
}

function checkZip(e){
	var zip = $('[name="zip"]:visible').val().replace('-', '');

	reg = /((900)\d{4}|(901)\d{4}|(902)\d{4}|(903)\d{4}|(904)\d{4}|(905)\d{4}|(906)\d{4}|(907)\d{4})/;
	return reg.test(zip) ? '＊ 沖縄県からのお申込み受付は終了いたしました' : true;
}

var spp = function(){
	var ua = navigator.userAgent;
	if (ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) {
		return true;
	} else if (ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0) {
		return false;
		  // タブレット用コード
	} else {
		return false;
		  // PC用コード
	}
	return false;
};

$(function () {
	// リアルタイムチェック
	initialize_validation();

	// -------------------------------------------------------------------------
	// イベント登録
	//
	// 買取箱希望区分変更イベント
	$('[name="box_count"]').change(kit_deliver_request_change);

	// 買取箱のサイズと箱数 開閉用関数
	$('[name="toggle_apply_kaitori_box"]').change(toggle_apply_kaitori_box);

	// 箱数選択イベント
	$('input[name^=kit_request_kind]').click(kit_box_click);
	$('[name="self_request_kind[1]"]').click(kit_box_click);
	$('*[name=minus_btn]').click(click_minus_btn);
	$('*[name=puls_btn]').click(click_plus_btn);

	// 買取箱お届け希望日変更イベント
	$('[name="kit_deliver_request_date"]').change(kit_deliver_request_date_change);

	// 買取箱お届け希望時間帯変更イベント
	$('[name="kit_deliver_request_time_kind"]').change(kit_deliver_request_time_kind_change);


	// 引取希望区分変更イベント
	$('input[name="collect_request_kind"]').change(collect_request_kind_change);

	// 引取希望日時変更イベント
	$('[name="collect_request_date"]').change(collect_request_date_change);

	// 買取金額の確認方法
	$('[name="contact_kind"]').change(contact_kind_change);

	// 遷移ボタン
	$('button[type="button"][name="next"]').click(next_page_btn_click);

	// 郵便番号ボタン
	$(document).on('input keyup blur', 'input[name=zip]', search_address);
	$('#search_address').click(search_address2);

	// テキストボックスのみ、フォーカスが外れた際に入力バリデーションを行う
	$(document).on('blur', 'input.validate_blur', validate_blur);

	$('#kit_deliver_request_date').change(kit_deliver_request_date_changed);

	$('.all_clearButton').click(count_all_clear);

	function validate_blur(){
		$(this).validationEngine('validate');
	}

	// パスワードの確認
	$('#pass').change(function(){
		if ( $(this).prop('checked') ) {
			$('[name="password"]').attr('type', 'text');
		} else {
			$('[name="password"]').attr('type', 'password');
		}

	});


	// -------------------------------------------------------------------------
	// 初期化
	//

	function initialize_validation(){
		// リアルタイム入力チェック
		$("#moshikomi1").validationEngine('attach', {

			validateNonVisibleFields: true, // 非表示タグをオプション対象にする
			promptPosition:'inline',		// インラインで表示する
			focusFirstField : false,		// エラー時に一番最初の入力フィールドにフォーカスさせない

			onFieldSuccess: function(field) {
				if(field) {
					if(field.is('input[name="collect_request_time_kind"]')) {

						// OK/NGアイコン削除
						field.parent().parent().removeClass('input_ok');
						field.parent().parent().removeClass('input_ng');

						// OKアイコン追加
						field.parent().parent().addClass('input_ok');
					} else {

						// 赤枠スタイル削除
						field.removeClass('input_ok');
						field.removeClass('input_ng');

						// OK/NGアイコン削除
						field.parent().removeClass('input_ok');
						field.parent().removeClass('input_ng');

						// OKアイコン追加
						field.parent().addClass('input_ok'); // クラス付与対象を親のdivに変更(アイコン用)
					}

					// サブミット後に表示される静的エラーを非表示にする
					var field_name = field.attr('name');
					var field_id = field.attr('id');

					if($('.' + field_name  + '_error').length){
						$('.' + field_name  + '_error').empty();
					}

					if(field_id == 'now_total_kit_count'  &&
						(
							$('.self_box_error').length ||
							$('.now_total_kit_count_error').length
						)
					){
						//商品を送る箱について
						$('.self_box_error').empty();
						$('.now_total_kit_count_error').empty();
					}
				}

			},
			onFieldFailure: function(field) {
				if(field) {
					if(field.is('input[name="collect_request_time_kind"]')) {

						// OK/NGアイコン削除
						field.parent().parent().removeClass('input_ok');
						field.parent().parent().removeClass('input_ng');

						// NGアイコンを追加
						field.parent().parent().addClass('input_ng');
					} else {

						// 赤枠スタイル削除
						field.removeClass('input_ok');
						field.removeClass('input_ng');

						// OK/NGアイコン削除
						field.parent().removeClass('input_ok');
						field.parent().removeClass('input_ng');

						// NGアイコンを追加
						field.addClass('input_ng');
						field.parent().addClass('input_ng');
					}

					// サブミット後に表示される静的エラーを非表示にする
					var field_name = field.attr('name');
					var field_id = field.attr('id');

					if($('.' + field_name  + '_error').length){
						$('.' + field_name  + '_error').empty();
					}

					if(field_id == 'now_total_kit_count'  &&
						(
							$('.self_box_error').length ||
							$('.now_total_kit_count_error').length
						)
					){
						// 商品を送る箱について
						$('.self_box_error').empty();
						$('.now_total_kit_count_error').empty();
					}
				}
			},

			custom_error_messages :{
				'#now_total_kit_count' : {
					'min': {
						'message': "＊ ダンボールの箱数を選択してください"
					},
				},
				'#kit_deliver_request_date' : {
					'required': {
						'message': "＊ お届け希望日をカレンダーから選択してください"
					},
				},
				'#collect_request_date' : {
					'required': {
						'message': "＊ 引取希望日をカレンダーから選択してください"
					},
				},
				'.collect_request_time_kind'	: {
					'required': {
						'message': "＊ 引取希望時間帯を選択してください"
					},
				},
				'.zip'	: {
					'required': {
						'message': "＊ 郵便番号を入力してください"
					},
				},
				'.prefecture_kind'	: {
					'required': {
						'message': "＊ 都道府県を選択してください"
					},
				},
				'.address01': {
					'required': {
						'message': "＊ 市区郡を入力してください"
					},
					'maxSize' : {
						'message': "＊ 市区郡は12文字以内で入力してください"
					},
				},
				'.address02': {
					'required': {
						'message': "＊ 町村名・番地を入力してください"
					},
					'maxSize' : {
						'message': "＊ 町村名・番地は16文字以内で入力してください"
					},
				},
				'.address03': {
					'maxSize' : {
						'message': "＊ 建物名は16文字以内で入力してください"
					},
				},
				'.name' : {
					'required': {
						'message': "＊ お名前を入力してください"
					},
					'minSize': {
						'message': "＊ お名前は氏名フルネームで、2文字以上で入力してください"
					},
					'maxSize': {
						'message': "＊ お名前は48文字以内で入力してください"
					}
				},
				'.tel'	: {
					'required': {
						'message': "＊ お電話番号を入力してください"
					},
					'minSize': {
						'message': "＊ 固定電話の場合は市外局番から入力してください"
					},
					'maxSize': {
						'message': "＊ お電話番号は半角英数15文字以内で入力してください"
					},
					'onlyNumberSp' : {
						'message': "＊ お電話番号を数字で入力してください（ハイフンは不要です）"
					}
				},
				'.email': {
					'required': {
						'message': "＊ メールアドレスを入力してください"
					},
					'minSize' : {
						'message': "＊ メールアドレスは半角6文字以上にしてください"
					},
				},
				'.job_kind'	: {
					'required': {
						'message': "＊ ご職業を選択してください"
					},
				},
				'.password'	: {
					'required': {
						'message': "＊ 希望するパスワードを入力してください"
					},
					'minSize' : {
						'message': "＊ パスワードは半角4文字以上で入力してください"
					},
					'maxSize' : {
						'message': "＊ パスワードは半角20文字以下で入力してください"
					},
					'custom[onlyLetterNumberSymbol]' : {
						'message': "＊ パスワードは半角英数字で入力してください"
					}
				},
				'.contact_kind'	: {
					'required': {
						'message': "＊ 買取金額の承諾方法を選択してください"
					},
				},
				'.pay_method_kind'	: {
					'required': {
						'message': "＊ 代金受取方法を選択してください"
					},
				},
				'#app_agree_checkbox'	: {
					'required': {
						'message': "＊ 利用規約と注意事項に同意が必要です"
					},
				},
			}
		});
	}


	//
	// 買取箱 初期化
	//
	function initialize_kit_box()
	{
		// 買取箱の背景を灰色に変更
		$('#now_total_kit_count1 > .kit_box').removeClass('checked');

		// 買取箱の箱数ラベルを0に変更
		$('#now_total_kit_count1').find('.kit_num').text(0);

		// 買取箱の選択箱計を0に変更
		$('input[name="kit01_count"]').val(0);
		$('input[name="kit03_count"]').val(0);
		$('input[name="kit06_count"]').val(0);
		$('input[name="kit08_count"]').val(0);
		$('input[name="kit05_count"]').val(0);

		// 買取箱の合計箱数を0に変更
		$('input[name="box_count"]').val(0).change();
		$('#now_total_kit_count').validationEngine('validate');

		var self_box_count = $('input[name="self_box01_count"]').val();
		if(self_box_count <= 0){
			// 現在箱数を初期化する
			$('#now_total_kit_count').val(0);
			$('#now_total_kit_count').validationEngine('validate');
		}
	}

	//
	// お届けエリアと希望日 初期化
	//

	function initialize_kit_deliver_request_area(){
		// お届け希望日
		$('[name="kit_deliver_request_date"]').val('');
		$('[name="kit_deliver_request_date"]').prop('disabled', true);
		//$('input[name=kit_deliver_request_time_kind]').prop('disabled', false).closest('.btn_time').removeClass('no_select');
		//$('[name="kit_deliver_request_date"]').validationEngine('validate');
		if($('[name="kit_deliver_request_date"]').parent().hasClass('input_ok')){
			$('[name="kit_deliver_request_date"]').parent().removeClass("input_ok"); // NGアイコン
		}

		if($('[name="kit_deliver_request_date"]').parent().hasClass('input_ng')){
			$('[name="kit_deliver_request_date"]').parent().removeClass('input_ng'); // NGアイコン
			$('[name="kit_deliver_request_date"]').removeClass('input_ng');			 // エラーの赤枠
			$('#kit_deliver_request_date_error').empty();							 // エラーメッセージ
		}
		// お届け希望時間帯(指定なし)
		$('#kit_deliver_request_time_kind_1').prop('checked', true);
	}

	// -------------------------------------------------------------------------
	// ダイアログ関係
	//

	// 買取箱選択後にダイアログを閉じる
	$(document).on('change', '#boxnum_pop [name="boxnum"]', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});


	// ポップアップを閉じる処理
	$('.closeButton').click(function(e) {
		e.preventDefault();
		$.magnificPopup.close();
	});


	// 各説明ポップアップ初期化
	$('.open-popup-link').magnificPopup({
		type:'inline'
	});

	// -------------------------------------------------------------------------
	// 買取箱モーダル関係
	//

	// OKボタン
	$('.okButton').click(function(e){
		okButton();
		e.preventDefault();
		$.magnificPopup.close();
	});


	// モーダルを閉じる処理
	$('#boxnum_pop').on('click', '.mfp-close', function() {
		okButton();
	});


	function kit_box_click()
	{
		var $sender       	= $(this);
		var checkbox_name 	= $(this).prop('name');
		var value_name    	= $(this).nextAll('input[type="hidden"]').prop('name');

		//選択合計箱数が最大合計箱数に達していて、開こうとした買取箱の数が0箱だった場合、
		//モーダルを開かないようにする

		// 選択した買取箱数取得
		var count = $('[name="' + value_name + '"]').val();

		// 買取箱希望区分取得
		var kit_deliver_request_kind = $('#kit_deliver_not_request_kind').val();

		// 自分で用意する箱数、買取箱合計数
		var self_kit_count = $('input[name="self_box01_count"]').val();
		var box_count	   = $('input[name="box_count"]').val();

		// 現在選択合計箱数、最大選択箱数
		var now_total_kit_count	= 0;
		var kit_total_max		= $sender.parents('#app_kit').find('.kit_total_max').val();

		if(kit_deliver_request_kind != 2) {
			// 買取箱を希望する場合
			now_total_kit_count = parseInt(self_kit_count) + parseInt(box_count);

		} else {
			// 買取箱を希望しない場合
			now_total_kit_count = self_kit_count;

		}

		var elm = $('#now_total_kit_count_error');
		$(elm).empty();
		if(now_total_kit_count == kit_total_max && count == 0) {
			// 選択合計箱数が最大合計箱数に達している
			// かつ 選択した買取箱の数が0箱だった場合、モーダルを開かない
			if (value_name === 'self_box01_count') {
				// 自分で箱を用意するに隠し要素を移動し、エラーメッセージを表示する。
				$('#now_total_kit_count0').after(elm);
				elm.append('<div id="box_count_error"></div>');
				$('#box_count_error').append('<div class="now_total_kit_countformError parentFormmoshikomi1 formError inline" style="opacity: 0.87; position: relative; top: 0px; left: 0px; right: initial; margin-top: 0px; display: block;"></div>');
				$('.now_total_kit_countformError').append('<div class="formErrorContent box_pop_error">＊ お申込み可能な最大箱数に達しました。</div>');
			} else {
				// 買取箱に隠し要素を移動し、エラーメッセージを表示する。
				$('input[name=' + value_name + ']').next('#error_msg_kaitorikit').append(elm);
				elm.append('<div id="box_count_error"></div>');
				$('#box_count_error').append('<div class="now_total_kit_countformError parentFormmoshikomi1 formError inline" style="opacity: 0.87; position: relative; top: 0px; left: 0px; right: initial; margin-top: 0px; display: block;"></div>');
				$('.now_total_kit_countformError').append('<div class="formErrorContent box_pop_error">＊ お申込み可能な最大箱数に達しました。</div>');
			}
			return ;
		}

		$.magnificPopup.open({
			items: {
				src: '#boxnum_pop',
			},
			type: 'inline',
			closeBtnInside: true,
			callbacks: {
				beforeOpen: function() {
					// フォームの値をモーダルに設定

					// 箱名取得
					var title = $sender.parent().find('.kit_title').text();

					// 箱種別取得
					var type  = $sender.parent().data('type');

					// 箱の説明文
					var explanatory_text = $sender.parent().find('.explanatory_text').html();

					// 箱のサイズ
					var width  = $sender.parent().find('input[name="width"]') .val();
					var height = $sender.parent().find('input[name="height"]').val();
					var depth  = $sender.parent().find('input[name="depth"]') .val();

					// 箱の画像パス
					var image_path = change_image(checkbox_name);

					var kit_deliver_request_kind = $('#moshikomi1 [name="kit_deliver_request_kind"]').val();
					var $pop = $(this.items[0].src);
					$pop.find('.needless').show();

					// サイズを初期化
					$pop.find('ul.size_kit').empty();

					// 選択した買取箱の箱数によってマイナスボタンの表示を有効化、無効化する
					if(count == 0) {
						$pop.find('.minus_btn').addClass('btn_disabled');
					} else {
						$pop.find('.minus_btn').removeClass('btn_disabled');
					}

					// 選択合計箱数が最大箱数以上に達しているかによってプラスボタンの表示を有効化、無効化する
					if(now_total_kit_count >= kit_total_max) {
						$pop.find('.plus_btn').addClass('btn_disabled');
					} else {
						$pop.find('.plus_btn').removeClass('btn_disabled');
					}

					// モーダルに値を表示する
					if(type == 'kit') {
						// 買取箱
						$pop.find('.kit_title').text(title);
						$pop.find('.explanatory_text').html(explanatory_text);

						$pop.find('#now_total_kit_count_label').text(now_total_kit_count);
						$pop.find('#kit_total_max').text(kit_total_max);
						$pop.find('.icon_item').attr('src',image_path);
						$pop.find('.kit_box_summary').show();
						$pop.find('.box_pop_info').show();
						$pop.find('.self_box_summary').hide();

						// サイズを設定
						var $li_depth = '';
						if(checkbox_name != 'kit_request_kind[8]'){
							// ゴルフバッグ用以外は奥行を表示
							$li_depth = $('<li>').html('<span class="tip gray">奥行</span><span class="depth">' + depth + '</span>');
						}
						$pop.find('ul.size_kit').append(
							$('<li>').html('<span class="tip gray">タテ</span><span class="height">' + height + '</span>'),
							$('<li>').html('<span class="tip gray">ヨコ</span><span class="width">' + width + '</span>'),
							$li_depth
						);

					} else {
						// 自分で用意する
						$pop.find('#now_total_kit_count_label').text(now_total_kit_count);
						$pop.find('#kit_total_max').text(kit_total_max);
						$pop.find('.kit_box_summary').hide();
						$pop.find('.box_pop_info').hide();
						$pop.find('.self_box_summary').show();
						$pop.find('.icon_item').attr('src', '../asset/img/moshikomi/icon_self_box01.png');
					}
					$pop.find('[id="counter"]').text(count);
					$pop.find('input[class="checkbox_name"]').val(checkbox_name);
					$pop.find('input[class="value_name"]').val(value_name);
					$pop.find('input[class="self_kit_count"]').val(self_kit_count);
					$pop.find('input[class="box_count"]').val(box_count);

				},
				beforeClose: function() {
				},
				close: function() {
				},
				afterClose: function() {
				}
			}
		});

		// チェックボックスを変えない
		return false;
	}


	function click_minus_btn()
	{
		//マイナスボタンを押されたとき値を１減らす処理
		var kit_total_max 		= $('#kit_total_max').text();
		var now_total_kit_count = $('#now_total_kit_count_label').text();
		var now_kit_count		= Number($('#counter').text());
		var value_name	= $("#boxnum_pop > .value_name").val();
		var btn_area			= $(this).parent();
		var self_kit_count 		= $('#boxnum_pop > .self_kit_count').val();
		var box_count			= $('#boxnum_pop > .box_count').val();

		//選択合計箱数が１以上かつ選択箱数が１以上
		if(now_total_kit_count > 0 && now_kit_count > 0) {

			now_kit_count--;
			now_total_kit_count--;
			$('#counter').text(now_kit_count);
			$('#now_total_kit_count_label').text(now_total_kit_count);

			//自分で用意する用と買取箱を希望する用それぞれで合計を持っているため、それぞれに値を入れる
			if(value_name === 'self_box01_count'){
				self_kit_count--;
				$('#boxnum_pop > .self_kit_count').val(self_kit_count);
			} else {
				box_count--;
				$('#boxnum_pop > .box_count').val(box_count);
			}

			//マイナスボタンの表示を有効化
			btn_area.find('.minus_btn').removeClass('btn_disabled');
			//プラスボタンを表示を有効化
			btn_area.find('.plus_btn').removeClass('btn_disabled');

			//選択合計箱数か選択箱数が0の場合、マイナスボタンの表示を無効化
			if(now_total_kit_count == 0 || now_kit_count == 0) {
				btn_area.find('.minus_btn').addClass('btn_disabled');
			}
			//選択合計箱数が最大箱数以上の場合、プラスボタンの表示を無効化
			if(now_total_kit_count >= kit_total_max || now_kit_count >= kit_total_max) {
				btn_area.find('.plus_btn').addClass('btn_disabled');
			}
			// 箱数上限のエラーメッセージを非表示にする
			$('.box_pop_error').css('display', 'none');

		}

	}


	function click_plus_btn()
	{
		// プラスボタンを押されたとき値を１増やす処理
		var kit_total_max 		= $('#kit_total_max').text();
		var now_total_kit_count = $('#now_total_kit_count_label').text();
		var now_kit_count		= Number($('#counter').text());
		var value_name	        = $("#boxnum_pop > .value_name").val();
		var btn_area			= $(this).parent();
		var self_kit_count		= $('#boxnum_pop > .self_kit_count').val();
		var box_count  			= $('#boxnum_pop > .box_count').val();

		//選択合計箱数が最大箱数より少ない
		if(now_total_kit_count < kit_total_max) {
			now_kit_count++;
			now_total_kit_count++;
			$('#counter').text(now_kit_count);
			$('#now_total_kit_count_label').text(now_total_kit_count);

			//自分で用意する用と買取箱を要請する用それぞれで合計を持っているため、
			//それぞれに値を入れる
			if(value_name === 'self_box01_count'){
				self_kit_count++;
				$('#boxnum_pop > .self_kit_count').val(self_kit_count);
			} else {
				box_count++;
				$('#boxnum_pop > .box_count').val(box_count);
			}

			//プラスボタンの表示を有効化
			btn_area.find('.plus_btn').removeClass('btn_disabled');
			//マイナスボタンの表示を有効化
			btn_area.find('.minus_btn').removeClass('btn_disabled');

			//選択合計箱数が最大箱数以上の場合、プラスボタンの表示を無効化
			if(now_total_kit_count >= kit_total_max || now_kit_count >= kit_total_max) {
				btn_area.find('.plus_btn').addClass('btn_disabled');
				$('.box_pop_error').css('display', '');
			}
		}
	}


	// OKボタン
	function okButton(){
		//モーダル内の値を取得する
		var count			= $('#counter').text();
		var checkbox_name	= $("#boxnum_pop > .checkbox_name").val();
		var value_name		= $("#boxnum_pop > .value_name").val();
		var self_kit_count 	= $('#boxnum_pop > .self_kit_count').val();
		var box_count 		= $('#boxnum_pop > .box_count').val();
		var kit_total_max 	= $('#kit_total_max').text();

		var $ctrl = $('[name="' + checkbox_name + '"]');
		var now_total_kit_count = $('#now_total_kit_count_label').text();

		//モーダル内の値をフォームにセットする
		// 表示値
		$ctrl.parent().find('.kit_num').text(count);
		// 即値
		$ctrl.parent().find('[name="' + value_name + '"]').val(count);

		//選択合計箱数
		$ctrl.parents('#app_kit').find('.now_total_kit_count').val(now_total_kit_count).change();

		//自分で用意する箱数・買取箱を希望数
		$('#app_kit').find('input[name="self_box01_count"]').val(self_kit_count);
		$('#app_kit').find('input[name="box_count"]').val(box_count).change();

		//最大箱数
		$ctrl.parents('#app_kit').find('.kit_total_max').val(kit_total_max);

		//選択箱数が１以上なら、買取箱の背景に黄色を付けチェックを入れる
		//選択箱数が０なら、買取箱の背景は灰色でチェックを入れない
		if(count > 0) {
			$ctrl.parent().addClass('checked');
		} else if(count == 0 && $ctrl.parent().hasClass('checked')) {
			$ctrl.parent().removeClass('checked');
		}

		// 箱数の全体個数入力チェック
		var elm = $('#now_total_kit_count_error');
		$(elm).remove();
		if (value_name === 'self_box01_count'){
			// 自分で箱を用意するに隠し要素を移動し、エラーメッセージを表示する。
			$('#now_total_kit_count0').after(elm);
		} else {
			// 買取箱に隠し要素を移動し、エラーメッセージを表示する。
			$('input[name=' + value_name + ']').next('#error_msg_kaitorikit').append(elm);
		}

		// 買取箱を希望する場合
		if($('[name="kit_deliver_request_kind"]').val() != 2) {
			// お届けエリアと希望日を表示
			show_kit_deliver_request_area();

			// 下部から上部へ郵便番号を移動させる
			var zip_elm = $('#zip_area');
			$(zip_elm).remove();
			$('#top_zip_area').append(zip_elm);

			// ログインしていなかったら郵便番号欄から取得
			if(!is_logined){
				var zip = $('[name="zip"]:visible').val().replace('-', '');
				// 7桁目が入力された時引取希望日を入力可にする
				if(zip.length == 7){
					$('[name="kit_deliver_request_date"]').prop('disabled', false);
				}
			}
		} else {
			// お届けエリアと希望日を非表示
			show_kit_deliver_request_area();

			// 上部から下部へ郵便番号を移動させる
			var zip_elm = $('#zip_area');
			$(zip_elm).remove();
			$('#bottom_zip_area').append(zip_elm);

			// 買取箱をリセット
			initialize_kit_box();

			// お届けエリアと希望日をリセット
			initialize_kit_deliver_request_area();
		}
	}


	// クリアボタン
	$('.clearButton').click(function(e){

		//モーダル内の値を取得する
		var count	    = $('#counter').text();
		var value_name	= $("#boxnum_pop > .value_name").val();
		var now_total_kit_count = $('#now_total_kit_count_label').text();
		var self_kit_count 	= $('#boxnum_pop > .self_kit_count').val();
		var box_count 		= $('#boxnum_pop > .box_count').val();

		// 自分で用意する箱数・買取箱を希望する数
		if (value_name === 'self_box01_count'){
			$('#boxnum_pop > .self_kit_count').val(0);
		} else {
			box_count = box_count - count;
			$('#boxnum_pop > .box_count').val(box_count);
		}

		// 選択合計箱数から選択箱数を引く
		now_total_kit_count = now_total_kit_count - count;

		// 選択箱数を0にする
		$('#counter').text(0);
		count = 0;

		$('#now_total_kit_count_label').text(now_total_kit_count);

		//マイナスボタンの表示を有効化
		$('#boxnum_pop').find('.minus_btn').removeClass('btn_disabled');
		//プラスボタンを表示を有効化
		$('#boxnum_pop').find('.plus_btn').removeClass('btn_disabled');

		//選択合計箱数か選択箱数が0の場合、マイナスボタンの表示を無効化
		if(now_total_kit_count == 0 || count == 0) {
			$('#boxnum_pop').find('.minus_btn').addClass('btn_disabled');
		}
		// 箱数上限のエラーメッセージを非表示にする
		$('.box_pop_error').css('display', 'none');
	});


	//選択している箱数をすべて0にする
	function count_all_clear(){
		// 自分で用意する箱数・買取箱を希望数を0にする
		$('.kit_num').text(0);
		$('input[name="self_box01_count"]').val(0);
		$('input[name="kit01_count"]').val(0);
		$('input[name="kit03_count"]').val(0);
		$('input[name="kit06_count"]').val(0);
		$('input[name="kit08_count"]').val(0);
		$('input[name="kit05_count"]').val(0);
		$('#box_count').val(0);
		$('#now_total_kit_count').val(0);
		$('#now_total_kit_count').validationEngine('validate');
		$('.box_pop_error').css('display', 'none');

		if(!is_logined){
			// 上部から下部へ郵便番号を移動させる
			var zip_elm = $('#zip_area');
			$(zip_elm).remove();
			$('#bottom_zip_area').append(zip_elm);
		}

		// 自分で箱を用意するに隠し要素を移動し、エラーメッセージを表示する。
		var elm = $('#now_total_kit_count_error');
		$(elm).remove();
		$('#now_total_kit_count0').after(elm);
		elm.empty();

		// 買取箱の背景は灰色でチェックを入れない
		$('.kit_box').removeClass('checked');

		// お届けエリアと希望日を非表示
		show_kit_deliver_request_area();

	}

	// -------------------------------------------------------------------------
	// 買取箱希望区分関連
	//

	// 買取箱希望区分変更関数
	function kit_deliver_request_change()
	{
		// 買取箱希望区分を取得
		var box_count = $(this).val();

		// 申込箱数>0の時買取箱希望にする
		if(box_count > 0) {
			/* 希望する場合 */
			$('[name="kit_deliver_request_kind"]').val(1);
		} else {
			/* 希望しない場合 */
			$('[name="kit_deliver_request_kind"]').val(2);
		}
	}


	// 買取箱のサイズと箱数 開閉用関数
	function toggle_apply_kaitori_box()
	{
		// 買取箱希望区分を取得
		var toggle_apply_kaitori_box = $(this).val();

		var zip_elm = $('#zip_area');
		$(zip_elm).remove();

		if(toggle_apply_kaitori_box != 2) {
			/* 閉じる */
			$(this).val(2);

			// 買取箱希望区分ラベルの表示切替
			$('label[for="toggle_apply_kaitori_box"]').html('<i class="fa fa-lg fa-angle-down" aria-hidden="true"></i>' + '&nbsp;' + '箱を希望する方はこちら');
			$('label[for="toggle_apply_kaitori_box"]').toggleClass("close");

			// 買取箱のサイズと箱数・お届けエリアと希望日を非表示
			$('.apply_kaitori_box').slideUp(
				600,
				function(){
					if(!is_logined){
						// 初回申込のみ、お届け希望日を選択不可状態に切替
						$('[name="kit_deliver_request_date"]').prop('disabled', true);
						//$('input[name=kit_deliver_request_time_kind]').prop('disabled', false).closest('.btn_time').removeClass('no_select');
					}
				}
			);

			// お届けエリアと希望日非表示
			$('#kit_arrival').hide();

			// 項目[郵便番号の入力]を項目[引取希望日]の上部に移動する
			$('#bottom_zip_area').append(zip_elm);


			//モーダル内通知文を非表示にする
			$('.box_pop_error').css('display', 'none');

			// 買取箱をリセット
			initialize_kit_box();

			// お届けエリアと希望日をリセット
			initialize_kit_deliver_request_area();

			//買取箱選択画面のエラー表示をなくす
			$('#now_total_kit_count_error').empty();

		} else {
			/* 開く */
			$(this).val(1);

			// 買取箱希望区分ラベルの表示切替
			$('label[for="toggle_apply_kaitori_box"]').html('<i class="fa fa-lg fa-angle-up" aria-hidden="true"></i>' + '&nbsp;' + '閉じる');
			$('label[for="toggle_apply_kaitori_box"]').toggleClass("close");

			// 買取箱のサイズと箱数・お届けエリアと希望日を表示
			$('.apply_kaitori_box').slideDown(600);

			// 項目[郵便番号の入力]を項目[お届け希望日]の上部に移動する
			$('#top_zip_area').append(zip_elm);
		}

		collect_refresh();

		kitdeliverrequestdate.kit_request_changed($('input[name=box_count]').val(), $('input[name=zip]').val(), $('input[name=kit_deliver_request_date]').val(), $('input[name=kit_deliver_request_time_kind]:checked').val(), function(){
			if ($('input[name=collect_request_date]').val()){
				kitdeliverrequestdatechanged();
			}
		});
	}

	//選んだ買取箱の種類によってモーダル内画像を変える
	function change_image(name) {

		switch(name){
			case 'kit_request_kind[1]': var modal_image_path = '../asset/img/moshikomi/img_kit01.png'; break;
			case 'kit_request_kind[3]': var modal_image_path = '../asset/img/moshikomi/img_kit03.png'; break;
			case 'kit_request_kind[6]': var modal_image_path = '../asset/img/moshikomi/img_kit06.png'; break;
			case 'kit_request_kind[8]': var modal_image_path = '../asset/img/moshikomi/img_kit08.png'; break;
			case 'kit_request_kind[5]': var modal_image_path = '../asset/img/moshikomi/img_kit05.png'; break;
			default:;
		}

		return modal_image_path;
	}


	//
	// お届けエリアと希望日をスライド表示
	//
	function show_kit_deliver_request_area(){

		// 買取箱数のみ表示
		var box_count = $('input[name="box_count"]').val();
		//var kit_arrival_display_type = $('#kit_arrival').is(':visible');
		if(box_count > 0){
			if(is_logined){
				// 会員情報を持っている場合は有効
				$('[name="kit_deliver_request_date"]').prop('disabled', false);
			}
			$('#kit_arrival').slideDown(400);

		} else {
			$('#kit_arrival').slideUp(400);
			initialize_kit_deliver_request_area();
		}
	}

	// -------------------------------------------------------------------------
	// お届け希望日・引取希望日
	//
	kitdeliverrequestdate = new KitDeliverRequestDate();
	var kitdeliverrequestdatechanged = function(){
		var csd = kitdeliverrequestdate.get_collect_request_date_min();
		var ced = kitdeliverrequestdate.get_collect_request_date_max();
		var cd = new Date($('input[name=collect_request_date]').val().replace(/[年月]/g, '/').replace(/日/, ''));
		if (cd < csd){
			$('input[name=collect_request_date]').val(CloudCalendar.formatdate(csd));
		}
		if (ced < cd){
			$('input[name=collect_request_date]').val(CloudCalendar.formatdate(csd));
		}
	};
	kitdeliverrequestdate.zip_changed($('input[name=box_count]').val(), $('input[name=zip]').val(), $('input[name=kit_deliver_request_date]').val(), $('input[name=kit_deliver_request_time_kind]:checked').val(), function(json){
		if ($('input[name=collect_request_date]').val()){
			kitdeliverrequestdatechanged();
		}
	}, function(json){
		kitdeliverrequestdate.set_is_collect_request_time_selectable(json.is_collect_request_time_selectable);
		if (!json.is_collect_request_time_selectable){
			$('input[name=collect_request_time_kind]').prop('checked', false).prop('disabled', true);
			$('#collect_request_time_kind_1').prop('checked', true).prop('disabled', false);
			$('#collect_request_time_kind_1').closest('.btn_time').removeClass('no_select');
		}
		//collect_refresh();
	});


	function kit_deliver_request_date_changed(){
		kitdeliverrequestdate.request_date_changed($('input[name=box_count]').val(), $('input[name=zip]').val(), $('input[name=kit_deliver_request_date]').val(), $('input[name=kit_deliver_request_time_kind]:checked').val(), function(json){
			kitdeliverrequestdatechanged();
			if ($('#collect_request_date').val()){
				$('#collect_request_date').validationEngine('validate');
			}
		});
	}


	function kit_deliver_request_date_change()
	{
		if ($('#kit_deliver_request_date').val()){
			$('#kit_deliver_request_date').validationEngine('validate');
		}

		collect_refresh();
	}


	function kit_deliver_request_time_kind_change()
	{
		collect_refresh();
		kit_deliver_request_date_changed();
	}


	$('#kit_deliver_request_date').focusin(function(){
		kitdeliverrequestdate.get_request_cloudcalendar(function(calendar){
			calendar.show($('#kit_deliver_request_date').closest('.parts'), $('#kit_deliver_request_date'));
		}, function(val){
			kitdeliverrequestdate.request_date_changed($('input[name=box_count]').val(), $('input[name=zip]').val(), val, $('input[name=kit_deliver_request_time_kind]:checked').val(), function(json){
				var element = $('input[name=collect_request_date]');
				if ($(element).val()){
					var d = new Date($(element).val().replace(/[年月]/g, '/').replace(/日/, ''));
					var sd = new Date(json.startDate.replace(/,/g, '/'));
					var ed = new Date(json.endDate.replace(/,/g, '/'));
					if (d > ed){
						$(element).val(CloudCalendar.formatdate(ed));
					}
					if (d <= sd){
						$(element).val(CloudCalendar.formatdate(sd));
						if ($('input[name=kit_deliver_request_date]').val()){
							var dd = new Date($('input[name=kit_deliver_request_date]').val().replace(/[年月]/g, '/').replace(/日/, ''));
							if (CloudCalendar.dateequal(dd, sd)){
								$('input[name=collect_request_time_kind]').each(function(i, e){
									if ($(e).val() === '11821'){
										$(e).prop('checked', true).prop('disabled', false).closest('.btn_time').removeClass('no_select');
									}
									else {
										$(e).prop('checked', false).prop('disabled', true).closest('.btn_time').addClass('no_select');
									}
								});
							}
						}
					}
				}
			});
		});
	});

	$('#collect_request_date').focusin(function(){
		kitdeliverrequestdate.get_collect_cloudcalendar(function(calendar){
			calendar.show($('#collect_request_date').closest('.parts'), $('#collect_request_date'));
		}, function(){
			collect_request_date_change();
		});
	});

	$('[type="radio"][name="collect_request_time_kind"]').click(function(){
		var collect_request_kind = $(this).val();

		// 入力チェック用
		setTimeout(function(){
			$('[type="hidden"][name="collect_request_time_kind"]').val(collect_request_kind).validationEngine('validate');
		}, 0);
	});


	//
	// 引取希望日の再設定
	//
	function collect_refresh(is_shortest_collect)
	{
		if(typeof is_shortest_collect === 'undefined') {
			is_shortest_collect = true;
		}

		var kit_deliver_request_kind = $('[name="kit_deliver_request_kind"]').val();
		var kit_deliver_request_date      = $('[name="kit_deliver_request_date"]').val();
		var kit_deliver_request_time_kind = $('[name="kit_deliver_request_time_kind"]:checked').val();
		var collect_request_date = $('input[name=collect_request_date]').val();

		// お引取り希望日の候補変更
		var collect_dates = get_collect_dates();
		if(is_shortest_collect) {
			collect_request_date =  collect_dates[0].value; // 最短
		}

		$('[name="collect_request_time_kind"]').prop('disabled', true);
		$('[name="collect_request_time_kind"]').parent().addClass('no_select');
		if ($('input[name=zip]').val()){
			if(
				kit_deliver_request_kind == 1 &&
				kit_deliver_request_date &&
				kit_deliver_request_date == collect_request_date &&
				kit_deliver_request_time_kind == 2
			) {
				if (kitdeliverrequestdate.get_is_collect_request_time_selectable()){
					// 同日引取
					$('#collect_request_time_kind_6').prop('checked', true);
					$('#collect_request_time_kind_6').prop('disabled', false);
					$('#collect_request_time_kind_6').parent().removeClass('no_select');
				}

			} else {
				var collect_request_kind = $('[name="collect_request_kind"]:checked').val();

				if(collect_request_kind == 1){
					// 引取を希望する場合
					var foundchecked = false;
					$('[name="collect_request_time_kind"]').each(function(i, ee){
						if ($(ee).prop('checked')){
							$(ee).prop('disabled', false);
							foundchecked = true;
						}
						else {
							$(ee).prop('disabled', !kitdeliverrequestdate.get_is_collect_request_time_selectable());
						}
					});
					if (!foundchecked && kitdeliverrequestdate.get_is_collect_request_time_selectable()){
						$('#collect_request_time_kind_1').prop('checked', true).prop('disabled', false);
					}

					$('[name="collect_request_time_kind"]').each(function(i, ee){
						var e = $(ee).parent();
						if (kitdeliverrequestdate.get_is_collect_request_time_selectable()){
							$(e).removeClass('no_select');
						}
						else{
							if ($(ee).val() === '10000'){
								$(e).removeClass('no_select');
							}
							else {
								$(e).addClass('no_select');
							}
						}
					});
				}
			}
		}
	}


	//
	// 引取区分の変更イベント処理
	//
	function collect_request_kind_change()
	{
		var collect_request_kind = $(this).val();
		var is_disabled = collect_request_kind != 1


		if(is_disabled) {
			// 希望しない
			$('#collect_request_area').slideUp(
				400,
				function(){
					// 非表示が終わってから選択不可状態にする
					$('[name="collect_request_date"]')     .prop('disabled', is_disabled);
					$('[name="collect_request_time_kind"]').prop('disabled', is_disabled);
				}
			);

		} else {
			// 希望する

			$('#collect_request_area').slideDown(400);
			$('[name="collect_request_date"]')     .prop('disabled', is_disabled);
			$('[name="collect_request_time_kind"]').prop('disabled', !(!is_disabled && kitdeliverrequestdate.get_is_collect_request_time_selectable()));
			if (!is_disabled && kitdeliverrequestdate.get_is_collect_request_time_selectable()){
				$('[name="collect_request_time_kind"]').closest('.btn_time').removeClass('no_select');
			}
		}
	}


	//
	// 引取希望日変更イベント
	//
	function collect_request_date_change()
	{
		collect_refresh(false);
	}


	function contact_kind_change()
	{
		var $sender = $(this);
		var contact_kind = $sender.val();

		if(is_person_verified){

			// 買取金額の確認方法
			if(contact_kind == 1) {
				// 連絡必要

				// 買取金額のお受取方法の非表示
				$('#pay_method').slideUp(
					400,
					function(){
						// アニメーションが完了してから選択不可状態にする
						$('#pay_method1_kind').prop('disabled', true);
						$('#pay_method3_kind').prop('disabled', true);
						$('#pay_method4_kind').prop('disabled', true);
					}
				);

			} else if(contact_kind == 2) {
				// 連絡不要

				// 買取金額のお受取方法の表示
				$('#pay_method').slideDown(400);
				$('#pay_method1_kind').prop('disabled', false);
				$('#pay_method3_kind').prop('disabled', false);
				$('#pay_method4_kind').prop('disabled', false);
			}
		}
		// 任意項目のバリデーション対応
		$('[name="address03"]').validationEngine('validate');                   // 建物名
		$('[name="collect_request_time_kind"]').validationEngine('validate');   // 引取希望時間帯

		// 住所情報自動入力ブラウザ対応
		$('input[name="prefecture_kind"]').val('');

		$('input[name="address01"]').validationEngine('validate');  // 市区郡
		$('input[name="address02"]').validationEngine('validate');  // 町村名・番地
		$('input[name="address03"]').validationEngine('validate');  // 建物名
		$('input[name="name"]').validationEngine('validate');       // お名前
		$('input[name="tel"]').validationEngine('validate');        // 電話番号
		$('[name="email"]').validationEngine('validate');           // メールアドレス
		$('[name="password"]').validationEngine('validate');        // パスワード

	}

	// 引取希望日無効化
	$('input[name=collect_request_time_kind]').prop('checked', false).prop('disabled', true).closest('.btn_time').addClass('no_select');

	// -------------------------------------------------------------------------
	// 住所検索関連
	//
	var lastzipcode = '';
	function search_address2(){
		lastzipcode = '';
		search_address();
	}


	function search_address()
	{
		$('#search_address').hide();
		var set_address_label = function(zip, prefecture, address01, address02){
			var add2 = (address02 === '以下に掲載がない場合') ? '' : address02;
			$('div.conf_add p').html('〒 ' + zip.slice(0, 3) + '-' + zip.slice(3) + '<br>' + prefecture + (address01 ? (' ' + address01) : address01));
		};

		var zip = $('[name="zip"]:visible').val().replace('-', '');	// ハイフンあれば取る
		// 桁数チェック
		if(zip.length != 7) {
			lastzipcode = zip;


			if(!is_logined){
				// 郵便番号を変更した時にお届け希望日、引取り希望日を初期化する
				$('[name="kit_deliver_request_date"]').prop('disabled', true);
				$('[name="collect_request_date"]').prop('disabled', true);

				if($('[name="kit_deliver_request_date"]').parent().hasClass('input_ok')){
					$('[name="kit_deliver_request_date"]').parent().removeClass("input_ok"); // NGアイコン
				}

				if($('[name="kit_deliver_request_date"]').parent().hasClass('input_ng')){
					$('[name="kit_deliver_request_date"]').parent().removeClass('input_ng'); // NGアイコン
					$('[name="kit_deliver_request_date"]').removeClass('input_ng');			 // エラーの赤枠
					$('#kit_deliver_request_date_error').empty();							 // エラーメッセージ
				}

				if($('[name="collect_request_date"]').parent().hasClass('input_ok')){
					$('[name="collect_request_date"]').parent().removeClass("input_ok"); // NGアイコン
				}

				if($('[name="collect_request_date"]').parent().hasClass('input_ng')){
					$('[name="collect_request_date"]').parent().removeClass('input_ng'); // NGアイコン
					$('[name="collect_request_date"]').removeClass('input_ng');			 // エラーの赤枠
					$('#collect_request_date_error').empty();							 // エラーメッセージ
				}

				// 初回申込のみ、郵便番号の形式が入力されるまでお届け希望日は選択不可
				$('[name="kit_deliver_request_date"]').val('');
				$('[name="collect_request_date"]').val('');
			}
			return;
		}
		if (zip === lastzipcode){
			return;
		}
		var regzip = /^[0-9][0-9][0-9].?[0-9][0-9][0-9][0-9]$/;
		if (!regzip.test(zip)){
			return;
		}
		lastzipcode = zip;

		var data = {};
		data.zip = zip;

		fetchingaddresssearchajaxphp = true;
		$.ajax({
			type     : 'post',
			url      : 'address_search_ajax.php',
			data     : data,
			dataType : 'json',
			success  : function(data, textStatus, jqXHR) {
				fetchingaddresssearchajaxphp = false;
				if(data.status == 'Success') {
					// 買取箱を希望する場合
					var kit_deliver_request_kind = $('#moshikomi1').find('[name="kit_deliver_request_kind"]').val();
					if(kit_deliver_request_kind != 2 && $('[name="kit_deliver_request_date"]').is(':disabled')){
						// お届け希望日を選択可能状態にする
						$('[name="kit_deliver_request_date"]').prop('disabled', false);
					}

					$('[name="collect_request_date"]').prop('disabled', data.data.do_not_collect);
					if (data.data.do_not_collect){
						$('input[name=collect_request_time_kind]').prop('checked', false).prop('disabled', true).closest('.btn_time').addClass('no_select');
					}

					// 値の設定
					$('select[name="prefecture_kind"]').val(data.data.prefecture_kind);
					$('input[name="address01"]').val(data.data.address01);
					$('input[name=address02]').val(data.data.address02);

					// 入力チェック
					$('[name="zip"]').validationEngine('validate');
					//$('[name="prefecture_kind"]').validationEngine('validate');
					$('[name="address01"]').validationEngine('validate');
					$('[name="address02"]').validationEngine('validate');

					// 住所ラベルを設定
					set_address_label(zip, '', '', '');

					// 住所ラベルを表示
					$('#address_label').show();
					if (!data.data.do_not_collect){
						kitdeliverrequestdate.zip_changed($('input[name=box_count]').val(), zip, $('input[name=kit_deliver_request_date]').val(), $('input[name=kit_deliver_request_time_kind]:checked').val(), zip_changed_f, function(json){
							requestcomplete = true;
							kitdeliverrequestdate.set_is_collect_request_time_selectable(json.is_collect_request_time_selectable);
							$('input[name=collect_request_time_kind]').each(function(i, e){
								if (json.is_collect_request_time_selectable){
									$(e).closest('.btn_time').removeClass('no_select');
									$(e).prop('disabled', false);
								} else{
									if ($(e).attr('type') === 'radio'){
										if ($(e).val() === '10000'){
											$(e).prop('disabled', false);
											$(e).prop('checked', true);
											$(e).closest('.btn_time').removeClass('no_select');
										}
										else {
											$(e).prop('disabled', true);
											$(e).prop('checked', false);
											$(e).closest('.btn_time').addClass('no_select');
										}
									}
								}
							});
							if (json.is_collect_request_time_selectable && ($('input[name=collect_request_time_kind]:checked').length === 0)){
								$('input[name=collect_request_time_kind][value=10000]').prop('checked', true).closest('.btn_time').removeClass('no_select');
							}
						});
					}
				}
			},
			error    : function(jqXHR, textStatus) {
				fetchingaddresssearchajaxphp = false;
			},
			complete : function(jqXHR, textStatus) {
				fetchingaddresssearchajaxphp = false;
			},
		});
		var requestcomplete = false;
		var zip_changed_f = function(){
			if (requestcomplete){
				kitdeliverrequestdatechanged();
			}
			else {
				setTimeout(zip_changed_f, 100);
			}
		};
	}

	// --------------------------------------------------------------------
	// フォーカス関連
	//
	var lastfocusinscrollelement = null;
	var focusinscroll = function(element){
		if (CloudCalendar.spp()){
			$(window).scrollTop($('.' + $(element).attr('data-scroll-target')).offset().top);
		}
		// TODO 進捗度バーのABテスト実施時に使います

		// else {
		//     lastfocusinscrollelement = element;
		//     var calendarh = 0;
		//     if (($(element).attr('name') === 'collect_request_date') || ($(element).attr('name') === 'kit_deliver_request_date')){
		//         calendarh = 306;
		//     }
		//     var progressh = $('div.gauge_wrap').css('height').replace(/([0-9]+)px/, "$1")*1
		//     var height = $(element).parent().height();
		//     var h = progressh + height + calendarh;
		//     var offsettop = $(element).offset().top;
		//     setTimeout(function(){
		//         var scrolltop = offsettop - $('body').height() + h;
		//         if (($(window).scrollTop() + $('body').height() - h) < offsettop){
		//             setTimeout(function(){
		//                 $(window).scrollTop(scrolltop);
		//             }, 0);
		//         }
		//     }, 0);
		// }
	};
	$('input[type="text"]').focusin(function(){
		focusinscroll(this);
	});

	// TODO 進捗度バーのABテスト実施時に使います
	// $('input[type="tel"]').focusin(function(){
	//     focusinscroll(this);
	// });
	// $('input[type="password"]').focusin(function(){
	//     focusinscroll(this);
	// });
	// $('body').validationEngine('setshowmessagecallback', function(){
	//     setTimeout(function(){
	//         if (lastfocusinscrollelement){
	//             focusinscroll(lastfocusinscrollelement);
	//             lastfocusinscrollelement = null;
	//         }
	//     }, 0);
	// });


	// --------------------------------------------------------------------
	// 申込イベント関連
	//

	function get_post_data(){
		var data = {};

		// 買取箱希望区分
		data.kit_deliver_request_kind      = $('input[name="kit_deliver_request_kind"]').val();

		// 買取箱
		// 未選択時に0をセットし、選択時に箱数をセットする
		data.kit01_count = parseInt($('input[name="kit01_count"]').val()) || 0;
		data.kit03_count = parseInt($('input[name="kit03_count"]').val()) || 0;
		data.kit05_count = parseInt($('input[name="kit05_count"]').val()) || 0;
		data.kit06_count = parseInt($('input[name="kit06_count"]').val()) || 0;
		data.kit08_count = parseInt($('input[name="kit08_count"]').val()) || 0;

		// 自分で用意する箱数
		data.self_box01_count = $('input[name="self_box01_count"]').val();


		// お届け希望日時
		data.kit_deliver_request_date      = $('input[name="kit_deliver_request_date"]').val();
		data.kit_deliver_request_time_kind = $('input[name="kit_deliver_request_time_kind"]:checked').val();

		// 引取希望区分
		data.collect_request_kind      = $('input[name="collect_request_kind"]:checked').val();

		// 引取希望日時
		data.collect_request_date      = $('input[name="collect_request_date"]').val();
		data.collect_request_time_kind = $('input[name="collect_request_time_kind"]:checked').val();

		// 旧 お客様情報
		data.name                      = $('[name="name"]').val();
		data.zip                       = $('[name="zip"]').val();
		data.prefecture_kind           = $('[name="prefecture_kind"]').val();
		data.address01                 = $('[name="address01"]').val();
		data.address02                 = $('[name="address02"]').val();
		data.address03                 = $('[name="address03"]').val();
		data.tel                       = $('[name="tel"]').val();
		data.email                     = $('[name="email"]').val();
		data.password                  = $('[name="password"]').val();
		data.password_check            = $('[name="password_check"]').val();
		data.job_kind                  = $('[name="job_kind"]:checked').val();

		// 旧 代金受取方法の選択
		data.contact_kind    = $('[name="contact_kind"]:checked').val();
		data.pay_method_kind = $('[name="pay_method_kind"]:checked').val();
		data.app_agree       = $('[name="app_agree"]:checked').val();

		data.subscribe_flag  = $('[name="subscribe_flag"]:checked').val();
		return data;
	}

	//
	// ページ遷移
	//
	function next_page_btn_click()
	{
		var post_data = get_post_data();
		// if(!confirm('申込を確定します。\nよろしいですか？')) {
		// 	return;
		// }
		$.ajax({
			type     : 'post',
			url      : 'input_check_ajax.php',
			data     : post_data,
			dataType : 'json',

			context  : $('form#moshikomi1'),
			beforeSend: function(xhr, settings) {
				$('button[type="button"][name="next"]').prop('disabled', true);
			},
			success  : function(data, textStatus, jqXHR) {
				if(data.status == 'Success')
				{
					// 登録に不要な値を無効化
					$('input[name="depth"]').prop('disabled', true);
					$('input[name="height"]').prop('disabled', true);
					$('input[name="width"]').prop('disabled', true);

					$('input[name="box_count"]').prop('disabled', true);
					$('input[name="kit_deliver_request_kind"]').prop('disabled', true);
					$('input[name="toggle_apply_kaitori_box"]').prop('disabled', true);

					$('input[name="test"]').prop('disabled', true);

					this.prop('action', 'mail_send.php');
					this.submit();

				}else if(data.status == 'Failed') {
					if(data['action'] == 'input_check'){
						set_error_messages(data.error_messages);
						$('button[type="button"][name="next"]').prop('disabled', false);
					}
				}
			},
			error    : function(jqXHR, textStatus) {

			},
			complete : function(jqXHR, textStatus) {

			},
		});
		return false;
	}


	/**
	 * [get_input_checks description]
	 *
	 * @return {[type]} [description]
	 */
	function get_input_checks()
	{
		/*
		エラーメッセージキー : {
			scroll_target: スクロール先のセレクタ
			error_ctr:     フォーカス当てるコントローラのセレクタ
			error_mes:     メッセージを登録するセレクタ(同期通信による入力チェック時のエラーメッセージ)
			jqv_error_mes: メッセージを登録するセレクタ(リアルタイム入力チェック時のエラーメッセージ)
		},
		セレクタ未指定時は空白にする
		*/

		var input_checks = {
			// purchase_item : {
			// 	scroll_target:  '.purchase_item_scroll_target',
			// 	error_ctr:      '',
			// 	error_mes:      '.purchase_item_error',
			// 	jqv_error_mes:  '#purchase_item_error'
			// },
			box_count:{
				scroll_target:  '.box_count_scroll_target',
				error_ctr:      '',
				error_mes:      '.box_count_error',
				jqv_error_mes:  '#box_count_error'
			},
			kit_kind: {
				scroll_target:  '.kit_deliver_request_kind_scroll_target',
				error_ctr:      '',
				error_mes:      '.kit_deliver_request_kind_error',
				jqv_error_mes:  '#kit_deliver_request_kind_error'
			},
			self_box01_count : {
				scroll_target:  '.self_box_scroll_target',
				error_ctr:      '',
				error_mes:      '.self_box_error',
				jqv_error_mes:  '#self_box_error'
			},
			zip:{
				scroll_target:  '.zip_scroll_target',
				error_ctr:      '[name="zip"]',
				error_mes:      '.zip_error',
				jqv_error_mes:  '#zip_error'
			},
			kit_deliver_request_date : {
				scroll_target:  '.kit_deliver_request_date_scroll_target',
				error_ctr:      '[name="kit_deliver_request_date"]',
				error_mes:      '.kit_deliver_request_date_error',
				jqv_error_mes:  '#kit_deliver_request_date_error'
			},
			// kit_deliver_request_date: {
			//     scroll_target:  '.address_scroll_target',
			//     error_ctr:      '',
			//     error_mes:      '.kit_deliver_request_date_error',
			//     jqv_error_mes:  '#kit_deliver_request_date_error'
			// },
			kit_deliver_request_time_kind : {
				scroll_target: '.kit_deliver_request_time_kind_scroll_target',
				error_ctr:     '',
				error_mes:     '.kit_deliver_request_time_kind_error',
				jqv_error_mes:  '#kit_deliver_request_time_kind_error'
			},
			collect_request_kind: {
				scroll_target:  '.collect_request_kind_scroll_target',
				error_ctr:      '',
				error_mes:      '.collect_request_kind_error',
				jqv_error_mes:  '#collect_request_kind_error'
			},
			collect_request_date : {
				scroll_target:  '.collect_request_date_scroll_target',
				error_ctr:      '[name="collect_request_date"]',
				error_mes:      '.collect_request_date_error',
				jqv_error_mes:  '#collect_request_date_error'
			},
			collect_request_time_kind : {
				scroll_target:  '.collect_request_time_kind_scroll_target',
				error_ctr:      '',
				error_mes:      '.collect_request_time_kind_error',
				jqv_error_mes:  '#collect_request_time_kind_error'
			},
			prefecture_kind: {
				scroll_target: '.prefecture_kind_scroll_target',
				error_ctr:     '[name="prefecture_kind"]',
				error_mes:     '.prefecture_kind_error',
				jqv_error_mes: '#prefecture_kind_error'
			},
			address01 : {
				scroll_target:  '.address01_scroll_target',
				error_ctr:      '[name="address01"]',
				error_mes:      '.address01_error',
				jqv_error_mes:  '#address01_error'
			},
			address02 : {
				scroll_target:  '.address02_scroll_target',
				error_ctr:      '[name="address02"]',
				error_mes:      '.address02_error',
				jqv_error_mes:  '#address02_error'
			},
			address03 : {
				scroll_target:  '.address03_scroll_target',
				error_ctr:      '[name="address03"]',
				error_mes:      '.address03_error',
				jqv_error_mes:  '#address03_error'
			},
			name : {
				scroll_target:  '.name_scroll_target',
				error_ctr:      '[name="name"]',
				error_mes:      '.name_error',
				jqv_error_mes:  '#name_error'
			},
			tel: {
				scroll_target:  '.tel_scroll_target',
				error_ctr:      '',
				error_mes:      '.tel_error',
				jqv_error_mes:  '#tel_error'
			},
			email : {
				scroll_target:  '.email_scroll_target',
				error_ctr:      '[name="email"]',
				error_mes:      '.email_error',
				jqv_error_mes:  '#email_error'
			},
			job_kind :{
				scroll_target:  '.job_kind_scroll_target',
				error_ctr:      '',
				error_mes:      '.job_kind_error',
				jqv_error_mes:  '#job_kind_error'
			},
			password : {
				scroll_target:  '.password_scroll_target',
				error_ctr:      '[name="password"]',
				error_mes:      '.password_error',
				jqv_error_mes:  '#password_error'
			},
			contact_kind : {
				scroll_target:  '.contact_kind_scroll_target',
				error_ctr:      '',
				error_mes:      '.contact_kind_error',
				jqv_error_mes:  '#contact_kind_error'
			},
			pay_method_kind:{
				scroll_target:  '.pay_method_kind_scroll_target',
				error_ctr:      '',
				error_mes:      '.pay_method_kind_error',
				jqv_error_mes:  '#pay_method_kind_error'
			},
			app_agree: {
				scroll_target:  '.app_agree_scroll_target',
				error_ctr:      '[name="app_agree"]',
				error_mes:      '.app_agree_error',
				jqv_error_mes:  '#app_agree_error'
			}
		};

		return input_checks;
	}


	/**
	 * エラーメッセージを表示する
	 *
	 * @param {[type]} error_messages [description]
	 */
	function set_error_messages(error_messages)
	{
		var $form = $('#moshikomi1');
		var input_checks = get_input_checks();


		// リアルタイム入力チェックのエラーメッセージをクリアする
		for(var mes_key in input_checks) {
			var jqv_error_mes = input_checks[mes_key].jqv_error_mes;

			// エラーメッセージのセレクタ(リアルタイム入力チェック)
			var $jqvmessage_elem = $form.find(jqv_error_mes);
			if($jqvmessage_elem.children().length > 0) {
				// エラーメッセージが設定されている場合、エラーメッセージの削除 / NGアイコン非表示 / 赤枠のスタイルを取り除く
				$('[name="' + mes_key + '"]').validationEngine('hide');
				$('[name="' + mes_key + '"]').parent().removeClass('input_ng');
				$('[name="' + mes_key + '"]').removeClass('input_ng');
			}

			if($('#now_total_kit_count_error').children().length > 0 ||
			   $('#self_box_error').children().length > 0
			){
				// 商品を送る箱について
				$('#now_total_kit_count').validationEngine('hide');
			}
		}

		// エラーメッセージをクリアする
		for(var mes_key in input_checks) {
			var error_mes = input_checks[mes_key].error_mes;

			$form.find(error_mes).empty();
		}

		// エラーメッセージを設定する
		for(var mes_key in input_checks)
		{
			var error_mes = input_checks[mes_key].error_mes;

			var $message_elem = $form.find(error_mes);

			set_error_message($message_elem, error_messages[mes_key]);
		}

		// 最初にエラーが起きたコントローラまでスクロールする
		for(var mes_key in input_checks)
		{
			var error_ctr     = input_checks[mes_key].error_ctr;
			var error_mes     = input_checks[mes_key].error_mes;
			var scroll_target = input_checks[mes_key].scroll_target;

			if(
				typeof error_messages[mes_key] !== 'undefined' &&
				error_messages[mes_key] != ''
			) {
				// エラーが発生していれば
				if(error_ctr != '') {
					// フォーカスをあてる
					$form.find(error_ctr).focus();
				}

				// スクロールする
				if(scroll_target != '') {
					var position = $form.find(scroll_target).offset().top;
					$(document).scrollTop(position);
				}
				break;
			}
		}
	}


	/**
	 * エラーメッセージを設定する
	 *
	 * @param {[type]} $message_elem [description]
	 * @param {[type]} error_message [description]
	 */
	function set_error_message($message_elem, error_message)
	{
		if(
			typeof error_message !== 'undefined' &&
			error_message != ''
		) {
			// エラーメッセージがある時
			if($message_elem.find('.error_message').length > 0) {
				$message_elem.find('.error_message').append(
					$('<li>').html('＊ ' + error_message) // ＊を先頭に付ける
				);

			} else {
				$message_elem.append(
					$('<ul class="error_message">').append(
						$('<li>').html('＊ ' + error_message) // ＊を先頭に付ける
					)
				);
			}
		}
	}

	// --------------------------------------------------------------------
	// ユーティリティー関数群
	//

	//
	// お取引希望日の候補を取得する
	//
	function get_collect_dates()
	{
		// 買取箱希望
		var is_kit_request_ = ($('[name="kit_deliver_request_kind"]').val() == 1);

		var $kit_deliver_request_date_ctrl = $('select[name="kit_deliver_request_date"]');
		var kit_deliver_request_date_selected_index = $kit_deliver_request_date_ctrl.prop('selectedIndex');

		var kit_deliver_request_time_kind = $('[name="kit_deliver_request_time_kind"]:checked').val();

		//
		// 引き取り日を設定する
		//
		var collect_dates = null;
		if(is_kit_request_ && kit_deliver_request_date_selected_index > 0) {
			collect_dates = $.extend(true, [], collect_dates_matrix['use_kit'][kit_deliver_request_date_selected_index -1 ]);

			if(kit_deliver_request_time_kind != 2) {
				collect_dates.shift();
			}else{
				collect_dates.pop();
			}

		} else {
			collect_dates = $.extend(true, [], collect_dates_matrix['unused_kit']);
		}
		return collect_dates;
	}
});

$(window).load(function () {
	setTimeout(function(){
		if(!is_logined){
			// 入力フォームを初期化
			// 各ブラウザの住所自動入力機能によって、
			// 最初のクリック時にフォーカスが該当の項目に遷移する問題の防止策

			// 都道府県
			$('select[name="prefecture_kind"]').val('');
			$('select[name="prefecture_kind"]').validationEngine('hide');
			$('select[name="prefecture_kind"]').parent().removeClass('input_ng');
			$('select[name="prefecture_kind"]').removeClass('input_ng');

			// 市区郡
			$('input[name="address01"]').val('');
			$('input[name="address01"]').validationEngine('hide');
			$('input[name="address01"]').parent().removeClass('input_ng');
			$('input[name="address01"]').removeClass('input_ng');

			// 町村名・番地
			$('input[name="address02"]').val('');
			$('input[name="address02"]').validationEngine('hide');
			$('input[name="address02"]').parent().removeClass('input_ng');
			$('input[name="address02"]').removeClass('input_ng');

			// 建物名
			$('input[name="address03"]').val('');
			$('input[name="address03"]').validationEngine('hide');
			$('input[name="address03"]').parent().removeClass('input_ng');
			$('input[name="address03"]').removeClass('input_ng');

			// お名前
			$('input[name="name"]').val('');
			$('input[name="name"]').validationEngine('hide');
			$('input[name="name"]').parent().removeClass('input_ng');
			$('input[name="name"]').removeClass('input_ng');

			// 電話番号
			$('input[name="tel"]').val('');
			$('input[name="tel"]').validationEngine('hide');
			$('input[name="tel"]').parent().removeClass('input_ng');
			$('input[name="tel"]').removeClass('input_ng');

			// メールアドレス
			$('input[name="email"]').val('');
			$('input[name="email"]').validationEngine('hide');
			$('input[name="email"]').parent().removeClass('input_ng');
			$('input[name="email"]').removeClass('input_ng');

			// パスワード
			$('input[name="password"]').val('');
			$('input[name="password"]').validationEngine('hide');
			$('input[name="password"]').parent().removeClass('input_ng');
			$('input[name="password"]').removeClass('input_ng');

			// フォーカスを外す
			//document.activeElement.blur();
		}
	},500);

});
