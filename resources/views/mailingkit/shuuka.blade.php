<div class="form-group row" id="date_and_time_hidden_row">
    @php($item_name = 'date_and_time_hidden')
    <label class="col-md-3 col-form-label row">
        集荷希望日時
    </label>
    <div class="col-md-8">

        <input
                type="text"
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                value="{{ old($item_name) }}"
                aria-describedby="{{ $item_name }}HelpBlock"
                placeholder="こちらをクリックして日時を選択してください。"
                data-toggle="modal" data-target="#calender_boxModal"
                autocomplete="off"
                readonly
        >
        <div class="valid-feedback">
            入力済みです。
        </div>
        <div class="invalid-feedback">
            集荷希望日時を入力してください。
        </div>

        @if ($errors->has($item_name))
            <div class="invalid-feedback">
                <strong>{{ $errors->first($item_name) }}</strong>
            </div>
        @endif
    </div>
</div><!-- end form-group -->

<div class="modal fade" id="calender_boxModal" tabindex="-1" role="dialog" aria-labelledby="calender_boxModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calender_boxModalLabel">集荷希望日時</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="calender_alert alert alert-warning">15時以降のお申込みは最短翌々日の集荷です。</div>
                <table id="calender_box" class="text-center">
                    <tr>
                        <th rowspan="2">日時</th>
                        <th colspan="7">{{ $kongetu }}</th>
                    </tr>
                    <tr>
                        <th >{!! $td_day[1] !!}</th>
                        <th >{!! $td_day[2] !!}</th>
                        <th >{!! $td_day[3] !!}</th>
                        <th >{!! $td_day[4] !!}</th>
                        <th >{!! $td_day[5] !!}</th>
                        <th >{!! $td_day[6] !!}</th>
                        <th >{!! $td_day[7] !!}</th>
                    </tr>
                    <tr>
                        <th class="left_th">{!! $sel[1] !!}</th>
                        <td class="day_time_sel" id="{{ $month[1].'/'.$day[1].'('.$wday[1].') '.$sel[1] }}">{!! $today_time[1] !!}</td>
                        <td class="day_time_sel" id="{{ $month[2].'/'.$day[2].'('.$wday[2].') '.$sel[1] }}">{!! $tomorroww_morning !!}</td>
                        <td class="day_time_sel" id="{{ $month[3].'/'.$day[3].'('.$wday[3].') '.$sel[1] }}">{!! $two_days_later_morning !!}</td>
                        <td class="day_time_sel" id="{{ $month[4].'/'.$day[4].'('.$wday[4].') '.$sel[1] }}">{!! $three_days_later_morning !!}</td>
                        <td class="day_time_sel" id="{{ $month[5].'/'.$day[5].'('.$wday[5].') '.$sel[1] }}"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="{{ $month[6].'/'.$day[6].'('.$wday[6].') '.$sel[1] }}"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="{{ $month[7].'/'.$day[7].'('.$wday[7].') '.$sel[1] }}"><span class='ok_time'>◎</span></td>
                    </tr>
                    <tr>
                        <th class="left_th">{!! $sel[2] !!}</th>
                        <td class="day_time_sel" id="{{ $month[1].'/'.$day[1].'('.$wday[1].') '.$sel[2] }}">{!! $today_time[2] !!}</td>
                        <td class="day_time_sel" id="{{ $month[2].'/'.$day[2].'('.$wday[2].') '.$sel[2] }}">{!! $tomorroww_all !!}</td>
                        <td class="day_time_sel" id="{{ $month[3].'/'.$day[3].'('.$wday[3].') '.$sel[2] }}">{!! $two_days_later_all !!}</td>
                        <td class="day_time_sel" id="{{ $month[4].'/'.$day[4].'('.$wday[4].') '.$sel[2] }}">{!! $three_days_later_all !!}</td>
                        <td class="day_time_sel" id="{{ $month[5].'/'.$day[5].'('.$wday[5].') '.$sel[2] }}"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="{{ $month[6].'/'.$day[6].'('.$wday[6].') '.$sel[2] }}"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="{{ $month[7].'/'.$day[7].'('.$wday[7].') '.$sel[2] }}"><span class='ok_time'>◎</span></td>
                    </tr>
                    <tr>
                        <th class="left_th">{!! $sel[3] !!}</th>
                        <td class="day_time_sel" id="{{ $month[1].'/'.$day[1].'('.$wday[1].') '.$sel[3] }}">{!! $today_time[3] !!}</td>
                        <td class="day_time_sel" id="{{ $month[2].'/'.$day[2].'('.$wday[2].') '.$sel[3] }}">{!! $tomorroww_all !!}</td>
                        <td class="day_time_sel" id="{{ $month[3].'/'.$day[3].'('.$wday[3].') '.$sel[3] }}">{!! $two_days_later_all !!}</td>
                        <td class="day_time_sel" id="{{ $month[4].'/'.$day[4].'('.$wday[4].') '.$sel[3] }}">{!! $three_days_later_all !!}</td>
                        <td class="day_time_sel" id="{{ $month[5].'/'.$day[5].'('.$wday[5].') '.$sel[3] }}"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="{{ $month[6].'/'.$day[6].'('.$wday[6].') '.$sel[3] }}"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="{{ $month[7].'/'.$day[7].'('.$wday[7].') '.$sel[3] }}"><span class='ok_time'>◎</span></td>
                    </tr>
                    <tr>
                        <th class="left_th">{!! $sel[4] !!}</th>
                        <td class="day_time_sel" id="{{ $month[1].'/'.$day[1].'('.$wday[1].') '.$sel[4] }}">{!! $today_time[4] !!}</td>
                        <td class="day_time_sel" id="{{ $month[2].'/'.$day[2].'('.$wday[2].') '.$sel[4] }}">{!! $tomorroww_all !!}</td>
                        <td class="day_time_sel" id="{{ $month[3].'/'.$day[3].'('.$wday[3].') '.$sel[4] }}">{!! $two_days_later_all !!}</td>
                        <td class="day_time_sel" id="{{ $month[4].'/'.$day[4].'('.$wday[4].') '.$sel[4] }}">{!! $three_days_later_all !!}</td>
                        <td class="day_time_sel" id="{{ $month[5].'/'.$day[5].'('.$wday[5].') '.$sel[4] }}"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="{{ $month[6].'/'.$day[6].'('.$wday[6].') '.$sel[4] }}"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="{{ $month[7].'/'.$day[7].'('.$wday[7].') '.$sel[4] }}"><span class='ok_time'>◎</span></td>
                    </tr>
                    @if($sel[5] !== "")
                        <tr>
                            <th class="left_th">{!! $sel[5] !!}</th>
                            <td class="day_time_sel" id="{{ $month[1].'/'.$day[1].'('.$wday[1].') '.$sel[5] }}">{!! $today_time[5] !!}</td>
                            <td class="day_time_sel" id="{{ $month[2].'/'.$day[2].'('.$wday[2].') '.$sel[5] }}">{!! $tomorroww_all !!}</td>
                            <td class="day_time_sel" id="{{ $month[3].'/'.$day[3].'('.$wday[3].') '.$sel[5] }}">{!! $two_days_later_all !!}</td>
                            <td class="day_time_sel" id="{{ $month[4].'/'.$day[4].'('.$wday[4].') '.$sel[5] }}">{!! $three_days_later_all !!}</td>
                            <td class="day_time_sel" id="{{ $month[5].'/'.$day[5].'('.$wday[5].') '.$sel[5] }}"><span class='ok_time'>◎</span></td>
                            <td class="day_time_sel" id="{{ $month[6].'/'.$day[6].'('.$wday[6].') '.$sel[5] }}"><span class='ok_time'>◎</span></td>
                            <td class="day_time_sel" id="{{ $month[7].'/'.$day[7].'('.$wday[7].') '.$sel[5] }}"><span class='ok_time'>◎</span></td>
                        </tr>
                    @endif
                </table>
                <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                    ※配送業者の混雑状況により、ご希望に沿えない場合がございます。
                </small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>