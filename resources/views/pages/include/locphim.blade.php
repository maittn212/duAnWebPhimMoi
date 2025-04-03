<form action="{{ route('locphim') }}" method="GET" class="filter-form">
    <style>
        .filter-form {
            padding: 10px;
            border-radius: 8px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .filter-form select {
            background: #12171b;
            color: white;
            border: 1px solid #444;
            padding: 6px 10px;
            font-size: 14px;
            border-radius: 5px;
            transition: 0.2s ease-in-out;
        }

        .filter-form select:focus {
            border-color: #b81c1e;
        }

        .filter-form button {
            background: #d10509;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.2s ease-in-out;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            font-weight: 500;
            box-shadow: 0px 2px 6px rgba(255, 77, 79, 0.3);
        }

        .filter-form button i {
            font-size: 13px;
        }

        .filter-form button:hover {
            background: #d9363e;
            box-shadow: 0px 3px 8px rgba(255, 77, 79, 0.5);
        }
    </style>

    <select name="order">
        <option value="">Sắp xếp</option>
        <option value="created_at">Ngày đăng mới nhất</option>
        <option value="year">Năm sản xuất</option>
        <option value="title">Tên phim</option>
        <option value="top_view">Lượt xem</option>
    </select>

    <select name="genre">
        <option value="">Thể loại</option>
        @foreach ($genres as $genre_filter)
            <option @selected(request('genre')  == $genre_filter->id) value="{{ $genre_filter->id }}">{{ $genre_filter->title }}</option>
        @endforeach
    </select>

    <select name="country">
        <option value="">Quốc gia</option>
        @foreach ($countries as $country_filter)
            <option  @selected(request('country')  == $country_filter->id)  value="{{ $country_filter->id }}">{{ $country_filter->title }}</option>
        @endforeach
    </select>

    <select name="year">
        <option value="">Năm</option>
        @for ($i = 2025; $i >= 2000; $i--)
            <option  @selected(request('year')  == $i)   value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    <button type="submit">
        <i class="fa fa-filter"></i> Lọc
    </button>
</form>