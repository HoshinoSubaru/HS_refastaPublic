<div class="form-group row" id="time_select_hidden_row">
    @php($item_name = 'time_select_hidden')
    <label class="col-md-3 col-form-label row">
        配送希望日時
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
                data-toggle="modal" data-target="#time_calender_boxModal"
                autocomplete="off"
                readonly
        >
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
        <div id="{{ $item_name }}HelpBlock" class="form-text font_black alert alert-warning">
            <strong>配送先が北海道、中国、四国、九州の場合は翌々日以降を選択してください。</strong><br>
            ※配送業者の混雑状況により、配達日時のご希望に沿えない場合がございます。<br>
            ※地域により時間枠が異なった場合、お申し込みの配送時間を当方で変更させて頂く場合がございます。<br>
        </div>
    </div>
</div><!-- end form-group -->

<div class="modal fade" id="time_calender_boxModal" tabindex="-1" role="dialog" aria-labelledby="time_calender_boxModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">梱包キットの配送希望日時</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="time_calender_box" class="text-center">
                    <tr>
                        <th rowspan="2">日時</th>
                        <th colspan="7"><?=$kongetu?></th>
                    </tr>
                    <tr>
                        <th><?=$td_day[2]?></th>
                        <th ><?=$td_day[3]?></th>
                        <th ><?=$td_day[4]?></th>
                        <th ><?=$td_day[5]?></th>
                        <th ><?=$td_day[6]?></th>
                        <th ><?=$td_day[7]?></th>
                        <th ><?=$td_day[8]?></th>
                    </tr>
                    <tr>
                        <th class="left_th"><?=$basic_sel[1]?></th>
                        <td class="day_time_sel" id="<?=$month[2].'/'.$day[2].'('.$wday[2].') '.$basic_sel[1]?>"><?=$basic_tomorroww_all?></td>
                        <td class="day_time_sel" id="<?=$month[3].'/'.$day[3].'('.$wday[3].') '.$basic_sel[1]?>"><?=$basic_two_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[4].'/'.$day[4].'('.$wday[4].') '.$basic_sel[1]?>"><?=$basic_three_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[5].'/'.$day[5].'('.$wday[5].') '.$basic_sel[1]?>"><?=$basic_four_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[6].'/'.$day[6].'('.$wday[6].') '.$basic_sel[1]?>"><?=$basic_five_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[7].'/'.$day[7].'('.$wday[7].') '.$basic_sel[1]?>"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="<?=$month[8].'/'.$day[8].'('.$wday[8].') '.$basic_sel[1]?>"><span class='ok_time'>◎</span></td>
                    </tr>
                    <tr>
                        <th class="left_th"><?=$basic_sel[2]?></th>
                        <td class="day_time_sel" id="<?=$month[2].'/'.$day[2].'('.$wday[2].') '.$basic_sel[2]?>"><?=$basic_tomorroww_all?></td>
                        <td class="day_time_sel" id="<?=$month[3].'/'.$day[3].'('.$wday[3].') '.$basic_sel[2]?>"><?=$basic_two_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[4].'/'.$day[4].'('.$wday[4].') '.$basic_sel[2]?>"><?=$basic_three_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[5].'/'.$day[5].'('.$wday[5].') '.$basic_sel[2]?>"><?=$basic_four_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[6].'/'.$day[6].'('.$wday[6].') '.$basic_sel[2]?>"><?=$basic_five_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[7].'/'.$day[7].'('.$wday[7].') '.$basic_sel[2]?>"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="<?=$month[8].'/'.$day[8].'('.$wday[8].') '.$basic_sel[2]?>"><span class='ok_time'>◎</span></td>
                    </tr>
                    <tr>
                        <th class="left_th"><?=$basic_sel[3]?></th>
                        <td class="day_time_sel" id="<?=$month[2].'/'.$day[2].'('.$wday[2].') '.$basic_sel[3]?>"><?=$basic_tomorroww_all?></td>
                        <td class="day_time_sel" id="<?=$month[3].'/'.$day[3].'('.$wday[3].') '.$basic_sel[3]?>"><?=$basic_two_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[4].'/'.$day[4].'('.$wday[4].') '.$basic_sel[3]?>"><?=$basic_three_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[5].'/'.$day[5].'('.$wday[5].') '.$basic_sel[3]?>"><?=$basic_four_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[6].'/'.$day[6].'('.$wday[6].') '.$basic_sel[3]?>"><?=$basic_five_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[7].'/'.$day[7].'('.$wday[7].') '.$basic_sel[3]?>"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="<?=$month[8].'/'.$day[8].'('.$wday[8].') '.$basic_sel[3]?>"><span class='ok_time'>◎</span></td>
                    </tr>
                    <tr>
                        <th class="left_th"><?=$basic_sel[4]?></th>
                        <td class="day_time_sel" id="<?=$month[2].'/'.$day[2].'('.$wday[2].') '.$basic_sel[4]?>"><?=$basic_tomorroww_all?></td>
                        <td class="day_time_sel" id="<?=$month[3].'/'.$day[3].'('.$wday[3].') '.$basic_sel[4]?>"><?=$basic_two_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[4].'/'.$day[4].'('.$wday[4].') '.$basic_sel[4]?>"><?=$basic_three_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[5].'/'.$day[5].'('.$wday[5].') '.$basic_sel[4]?>"><?=$basic_four_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[6].'/'.$day[6].'('.$wday[6].') '.$basic_sel[4]?>"><?=$basic_five_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[7].'/'.$day[7].'('.$wday[7].') '.$basic_sel[4]?>"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="<?=$month[8].'/'.$day[8].'('.$wday[8].') '.$basic_sel[4]?>"><span class='ok_time'>◎</span></td>
                    </tr>
                    <tr>
                        <th class="left_th"><?=$basic_sel[5]?></th>
                        <td class="day_time_sel" id="<?=$month[2].'/'.$day[2].'('.$wday[2].') '.$basic_sel[5]?>"><?=$basic_tomorroww_all?></td>
                        <td class="day_time_sel" id="<?=$month[3].'/'.$day[3].'('.$wday[3].') '.$basic_sel[5]?>"><?=$basic_two_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[4].'/'.$day[4].'('.$wday[4].') '.$basic_sel[5]?>"><?=$basic_three_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[5].'/'.$day[5].'('.$wday[5].') '.$basic_sel[5]?>"><?=$basic_four_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[6].'/'.$day[6].'('.$wday[6].') '.$basic_sel[5]?>"><?=$basic_five_days_later_all?></td>
                        <td class="day_time_sel" id="<?=$month[7].'/'.$day[7].'('.$wday[7].') '.$basic_sel[5]?>"><span class='ok_time'>◎</span></td>
                        <td class="day_time_sel" id="<?=$month[8].'/'.$day[8].'('.$wday[8].') '.$basic_sel[5]?>"><span class='ok_time'>◎</span></td>
                    </tr>
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