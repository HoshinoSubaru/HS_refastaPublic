<div class="form-group row" id="time_select_hidden_row">
    @php($item_name = 'time_select_hidden')
    <label class="col-md-3 col-form-label row">
        配送希望日時
    </label>
    <div class="col-md-8">
        <select
            class = "form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
            name = "{{ $item_name }}"
            id = "{{ $item_name }}"
            aria-describedby = "{{ $item_name }}HelpBlock"
        >
            <option value="">こちらをクリックして日時を選択してください。</option>


            @php($is_first_available_day = true)
            @for ($i = 0; $i <= $basic_nissuu; $i++)
                @if($basic_all_list[$i] === '<span class=\'ok_time\'>◎</span>')
                    @php( $day_i = ($i+2) )
                    @include('mailingkit.kit_calender_list_item', ['is_first_available_day' => $is_first_available_day])
                    @php($is_first_available_day = false)
                @endif
            @endfor


        </select>



        <div class="valid-feedback">
            入力済みです。
        </div>
        <div class="invalid-feedback">
            配送希望日時を入力してください。
        </div>
        @if ($errors->has($item_name))
            <div class="invalid-feedback">
                <strong>{{ $errors->first($item_name) }}</strong>
            </div>
        @endif

        {{-- <div class="alert alert-warning mt-3">
            <strong>ゴールデンウィーク期間中のお知らせ</strong>
            <div>
            2022/04/29・05/01・05/03 ～ 05/05の発送対応が出来かねます。
            </div>
        </div> --}}

        <div id="{{ $item_name }}HelpBlock" class="form-text font_black alert alert-warning">
            <div class="text-center">
                <strong>配送先が北海道、中国、四国、九州の場合は<br class="sp_only">翌々日以降を選択してください。</strong><br>
            </div>
            ※配送業者の混雑状況により、配達日時のご希望に沿えない場合がございます。<br>
            ※地域により時間枠が異なった場合、お申し込みの配送時間を当方で変更させて頂く場合がございます。<br>
        </div>
    </div>
</div><!-- end form-group -->
