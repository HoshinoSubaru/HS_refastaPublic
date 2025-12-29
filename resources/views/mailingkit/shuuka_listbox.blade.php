<div class="form-group row" id="date_and_time_hidden_row">
    @php($item_name = 'date_and_time_hidden')
    <label class="col-md-3 col-form-label row">
        <span class="badge badge-danger">必須</span>
        集荷希望日時
    </label>
    <div class="col-md-8">
        <div class="calender_alert alert alert-warning">16時以降のお申込みは最短翌々日の集荷です。</div>


            {{-- <div class="alert alert-warning ">
                <strong>ゴールデンウィーク期間中のお知らせ</strong>
                <div>ゴールデンウィーク期間中でも集荷可能ですが下記場合のみ対応は5/2（月）～となります。</div>
                <ul>
                    <li>郵便番号がご入力住所と異なる</li>
                    <li>集荷依頼時間指定がご入力住所の地域で対応していない</li>
                    <li>配送住所が正式住所ではない</li>
                </ul>
            </div> --}}


        <select
            class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
            name="{{ $item_name }}"
            id="{{ $item_name }}"
            aria-describedby="{{ $item_name }}HelpBlock"
        >
            <option value="">日時を選択してください。</option>
            
            {{-- =========================================
                day[1]（当日）：通常期間のみ表示
                ※年末年始期間中は非表示
            ========================================= --}}
            @if(!$is_nenmatsu_speed)
            @php( $day_i = 1 )
            @if($today_time[1] === "<span class='ok_time'>◎</span>")
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[1])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @endif
            @if($today_time[2] === "<span class='ok_time'>◎</span>")
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[2])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @endif
            @if($today_time[3] === "<span class='ok_time'>◎</span>")
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[3])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @endif
            @if($today_time[4] === "<span class='ok_time'>◎</span>")
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[4])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @endif
            @if($sel[5] !== "")
                @if($today_time[5] === "<span class='ok_time'>◎</span>")
                    @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[5])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @endif
            @endif
            @endif

            {{-- =========================================
                【年末年始対応】固定日付を起点として6日間表示
                ※$is_nenmatsu_speed で自動判定
                ※開始時間帯はControllerの $speed_first_available_time_index で制御
                ※1日目は開始時間帯から、2日目以降は全時間帯
            ========================================= --}}
            @if($is_nenmatsu_speed)
                @php($wday_names = ["日", "月", "火", "水", "木", "金", "土"])
                {{-- 年を動的に計算（12月なら翌年、1月以降なら今年） --}}
                @php($fixed_year = (date('n') == 12) ? date('Y') + 1 : date('Y'))
                @php($fixed_base_ts = strtotime("{$fixed_year}-{$nenmatsu_fixed_month_speed}-{$nenmatsu_fixed_day_speed}"))
                
                {{-- 1日目（固定日付）：開始時間帯から --}}
                @for($time_i = $speed_first_available_time_index; $time_i <= 4; $time_i++)
                    @php($value = $nenmatsu_fixed_month_speed.'/'.$nenmatsu_fixed_day_speed.'('.$nenmatsu_fixed_wday_speed.') '.$sel[$time_i])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @endfor
                
                {{-- 2日目〜6日目：全時間帯 --}}
                @for($offset = 1; $offset <= 5; $offset++)
                    @php($date_ts = strtotime("+{$offset} day", $fixed_base_ts))
                    @php($m = date('n', $date_ts))
                    @php($d = date('j', $date_ts))
                    @php($w = $wday_names[date('w', $date_ts)])
                    
                    @php($value = $m.'/'.$d.'('.$w.') '.$sel[1])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                    @php($value = $m.'/'.$d.'('.$w.') '.$sel[2])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                    @php($value = $m.'/'.$d.'('.$w.') '.$sel[3])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                    @php($value = $m.'/'.$d.'('.$w.') '.$sel[4])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @endfor
            @endif

            {{-- =========================================
                day[2]〜day[4]（翌日〜3日後）：通常期間のみ表示
                ※年末年始期間中は固定日付起点の6日間で表示するため非表示
            ========================================= --}}
            @if(!$is_nenmatsu_speed)
            @php( $day_i = 2 )
            @if($tomorroww_morning === "<span class='ok_time'>◎</span>")
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[1])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @endif
            @if($tomorroww_all === "<span class='ok_time'>◎</span>")
                @if($tomorroww_12 === "<span class='ok_time'>◎</span>")
                    @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[2])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @endif
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[3])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[4])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @if($sel[5] !== "")
                    @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[5])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @endif
            @endif

            @php( $day_i = 3 )
            @if($two_days_later_morning === "<span class='ok_time'>◎</span>")
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[1])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @endif
            @if($two_days_later_all === "<span class='ok_time'>◎</span>")
                @if($two_days_later_12 === "<span class='ok_time'>◎</span>")
                    @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[2])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @endif
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[3])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[4])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @if($sel[5] !== "")
                    @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[5])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @endif
            @endif

            @php( $day_i = 4 )
            @if($three_days_later_morning === "<span class='ok_time'>◎</span>")
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[1])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @endif
            @if($three_days_later_all === "<span class='ok_time'>◎</span>")
                @if($three_days_later_12 === "<span class='ok_time'>◎</span>")
                    @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[2])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @endif
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[3])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[4])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @if($sel[5] !== "")
                    @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[5])
                    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                @endif
            @endif

            {{-- day[5]〜day[7] --}}
            @php( $day_i = 5 )
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[1])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[2])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[3])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[4])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @if($sel[5] !== "")
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[5])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @endif

            @php( $day_i = 6 )
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[1])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[2])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[3])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[4])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @if($sel[5] !== "")
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[5])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @endif

            @php( $day_i = 7 )
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[1])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[2])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[3])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[4])
            <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @if($sel[5] !== "")
                @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[5])
                <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
            @endif
            @endif

        </select>

        <div class="valid-feedback">
            入力済みです。
        </div>
        <div class="invalid-feedback">
            集荷希望日時を入力してください。
        </div>
        <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
            ※配送業者の混雑状況により、ご希望に沿えない場合がございます。
        </small>

        @if ($errors->has($item_name))
            <div class="invalid-feedback">
                <strong>{{ $errors->first($item_name) }}</strong>
            </div>
        @endif
    </div>
</div><!-- end form-group -->
