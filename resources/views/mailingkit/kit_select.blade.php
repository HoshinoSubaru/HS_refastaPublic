<div class="card" id="kit_select_area">
    <div class="card-header">
        梱包キットの選択をしてください。
    </div>
    <div class="card-body">
        <div class="row">
            <div class="kit_select_box col-sm-12 col-md-3">
                <div class="kit_image">
                    <img
                            style="width: 150px;"
                            src="https://kinkaimasu.jp/commonimg/delivery/kit_main/s_01.jpg"
                            data-toggle="modal" data-target="#kit_s_modal"
                    />
                    <div class="text-center">Sサイズ</div>
                </div>
                <div class="row kit_count_row">
                    <div class="col kit_down btn btn-yellow">－</div>
                    <div class="col kit_number">
                        @php($kit_size = "s")
                        @php($item_name = "kit_count_".$kit_size)
                        <input
                                type="text"
                                class="kit_num_data"
                                data="{{ $kit_size }}"
                                name="{{ $item_name }}"
                                id="{{ $item_name }}"
                                value="{{ old($item_name, 0) }}"
                                readonly
                        />
                    </div>
                    <div class="col kit_up btn btn-yellow">＋</div>
                </div>
            </div>

            <div class="kit_select_box col-sm-12 col-md-3">
                <div class="kit_image">
                    <img
                            style="width: 150px;"
                            src="https://kinkaimasu.jp/commonimg/delivery/kit_main/m_01.jpg"
                            data-toggle="modal" data-target="#kit_m_modal"
                    />
                </div>
                <div class="row kit_count_row">
                    <div class="col-12 text-center">Mサイズ</div>
                    <div class="col kit_down btn btn-yellow">－</div>
                    <div class="col kit_number">
                        @php($kit_size = "m")
                        @php($item_name = "kit_count_".$kit_size)
                        <input
                                type="text"
                                class="kit_num_data"
                                data="{{ $kit_size }}"
                                name="{{ $item_name }}"
                                id="{{ $item_name }}"
                                value="{{ old($item_name, 0) }}"
                                readonly
                        />
                    </div>
                    <div class="col kit_up btn btn-yellow">＋</div>
                </div>
            </div>

            <div class="kit_select_box col-sm-12 col-md-3">
                <div class="kit_image">
                    <img
                            style="width: 150px;"
                            src="https://kinkaimasu.jp/commonimg/delivery/kit_main/l_01.jpg"
                            data-toggle="modal" data-target="#kit_l_modal"
                    />
                </div>
                <div class="row kit_count_row">
                    <div class="col-12 text-center">Lサイズ</div>
                    <div class="col kit_down btn btn-yellow">－</div>
                    <div class="col kit_number">
                        @php($kit_size = "l")
                        @php($item_name = "kit_count_".$kit_size)
                        <input
                                type="text"
                                class="kit_num_data"
                                data="{{ $kit_size }}"
                                name="{{ $item_name }}"
                                id="{{ $item_name }}"
                                value="{{ old($item_name, 0) }}"
                                readonly
                        />
                    </div>
                    <div class="col kit_up btn btn-yellow">＋</div>
                </div>
            </div>
        <!-- <div class="kit_select_box col-sm-12 col-md-3">
                      <div class="kit_image">
                        <img
                          style="width: 150px;"
                          src="https://kinkaimasu.jp/commonimg/delivery/kit_main/d_01.jpg"
                          data-toggle="modal" data-target="#kit_d_modal"
                        />
                      </div>
                      <div class="row kit_count_row">
                        <div class="col-12 text-center">着払い伝票のみ</div>
              					<div class="col kit_down btn btn-yellow">－</div>
                        <div class="col kit_number">
                          @php($kit_size = "d")
        @php($item_name = "kit_count_".$kit_size)
                <input
                  type="text"
                  class="kit_num_data"
                  data="{{ $kit_size }}"
                            name="{{ $item_name }}"
                            id="{{ $item_name }}"
                            value="{{ old($item_name, 0) }}"
                            readonly
                          />
                        </div>
                        <div class="col kit_up btn btn-yellow">＋</div>
                      </div>
            				</div> -->

            <div class="kit_select_box col-sm-12 col-md-3">
                <div class="kit_image">
                    <img
                            style="width: 150px;"
                            src="https://kinkaimasu.jp/commonimg/delivery/kit_main/k_01.jpg"
                            data-toggle="modal" data-target="#kit_k_modal"
                    />
                </div>
                <div class="row kit_count_row">
                    <div class="col-12 text-center">クッション封筒</div>
                    <div class="col kit_down btn btn-yellow">－</div>
                    <div class="col kit_number">
                        @php($kit_size = "k")
                        @php($item_name = "kit_count_".$kit_size)
                        <input
                                type="text"
                                class="kit_num_data"
                                data="{{ $kit_size }}"
                                name="{{ $item_name }}"
                                id="{{ $item_name }}"
                                value="{{ old($item_name, 0) }}"
                                readonly
                        />
                    </div>
                    <div class="col kit_up btn btn-yellow">＋</div>
                </div>
            </div>
        </div>
    </div>
</div>
