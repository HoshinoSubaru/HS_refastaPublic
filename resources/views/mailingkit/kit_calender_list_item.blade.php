{{--
@php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$basic_sel[1])
<option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
@php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$basic_sel[2])
<option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
@php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$basic_sel[3])
<option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
@php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$basic_sel[4])
<option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
@php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$basic_sel[5])
<option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
--}}

@if(!$is_first_available_day || $basic_first_available_time_index <= 1)
    @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$basic_sel[1])
    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
@endif
@if(!$is_first_available_day || $basic_first_available_time_index <= 2)
    @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$basic_sel[2])
    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
@endif
@if(!$is_first_available_day || $basic_first_available_time_index <= 3)
    @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$basic_sel[3])
    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
@endif
@if(!$is_first_available_day || $basic_first_available_time_index <= 4)
    @php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$basic_sel[4])
    <option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>
@endif
@php($value = $month[$day_i].'/'.$day[$day_i].'('.$wday[$day_i].') '.$basic_sel[5])
<option value="{{ $value }}" @if($value === old($item_name)) selected @endif>{{ $value }}</option>