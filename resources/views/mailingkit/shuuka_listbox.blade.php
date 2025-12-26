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


            @if(!$is_nenmatsu_speed)
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
            @else
                {{-- 年末年始期間：1/6 15~18時から --}}
                @for($day_i = 11; $day_i <= 14; $day_i++)
                    @if($day_i == 11)
                        {{-- 1/6：15~18時から --}}
                        @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[3])
                        <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                        @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[4])
                        <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                    @else
                        {{-- 1/7以降：全時間帯 --}}
                        @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[1])
                        <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                        @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[2])
                        <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                        @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[3])
                        <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                        @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$sel[4])
                        <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
                    @endif
                @endfor
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
