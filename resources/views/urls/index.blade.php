@extends('welcome')

@section('content')
    <h1>Простой сервис по сокращению ссылок</h1>
    <p>*последние из 10 выведенных можно редактировать</p>

    <div style="margin:0px auto;width:500px;">
        <form method="POST" action="{{ route('urls.store') }}">
            @csrf
            <input type="text" name="title" required maxlength="255" placeholder="{{ __('Title') }}"
                value="{{ old('title') }}" />

            <input type="text" name="original_url" required maxlength="255" placeholder="{{ __('Original Url') }}"
                value="{{ old('original_url') }}" />

            <button type="submit" name="submit">Сократить</button>
            <a href="/delete" class="cleaning">Очистить таблицу</a>
        </form>




        <div style="margin-top: 30px">

            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>N</th>
                        <th>Title</th>
                        <th>Original url</th>
                        <th>Shortener url</th>

                        <th></th>

                    </tr>
                </thead>
                <tbody>

                    @php
                        $i = 0;
                        $length = count($urls);

                        /*  $max = max(array_column(get_object_vars($urls), 'num')); */
                        $max = $urls->max('num');
                    @endphp

                    @foreach ($urls as $item)
                        <tr>
                            <td class="id_el">{{ $item->id }}</td>

                            <td {{ $item->num < $max - 10 ? '' : 'style = color:red' }}>{{ $item->num }}</td>
                            <td>{{ $item->title }}</td>

                            <td>{{ $item->original_url }}</td>

                            <td class="shortener_url">
                                <a href="http://{{ $item->original_url }}" target="_blank" id="{{ $item->id }}">
                                    <span>{{ $item->shortener_url }}</span>
                                </a>

                            </td>

                            @if ($item->num < $max - 9)
                                <td></td>
                            @else
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#myModal" onclick="output_current(this)">
                                        Edit
                                    </button>
                                </td>
                            @endif

                        </tr>

                        @php
                            $i++;
                        @endphp
                    @endforeach
        </div>

    </div>


    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Изменить сокращённый url</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('urls.store') }}" id="edit_url">
                        @csrf

                        <input type="hidden" name="id_url" value="" id="id_url" hidden />

                        <input type="text" name="original_url" required maxlength="255" value=""
                            id="modal_current_url_short" onchange="check_input(this,this.value)" />

                        <button type="submit" name="submit">Применить</button>

                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
