


@extends('adminlte::page')

@section('title', 'sliders')

@section('content_header')
    
    <h2 class="text-center">sliders List</h2>
@stop

@section('content')
    

        
        <a class="btn btn-danger mb-5" href="{{route('admin.sliders.create')}}">Add new slider</a>

        @if (session('message'))
            <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
        @endif
        <table class="table-bordered w-100">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Slider Img</th>
                <th>Status</th>
                <th>option</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($sliders)
                @forelse ($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td><img src="{{ url('admin/assets/images/sliders/' . $slider->img)  }}" width="50" alt="slider-img"></td>
                        <td>
                            {!! $slider->status == 0 ? '<div class="btn btn-danger">Not visiable</div>' : '<div class="btn btn-success">Visiable</div>' !!}
                        </td>
                        <td>
                        <a href="{{ route('admin.sliders.updateStatus', ['slider' => $slider->id, 'status' =>  $slider->status == 1 ? 0 : 1 ]) }}"
                                class="btn btn-{{ $slider->status == 1 ? 'success' : 'danger' }}  custom-btn">
                                {{ $slider->status == 1 ? 'Visiable' : 'Not Visable' }}
                            </a>

                        <form action="{{route('admin.sliders.destroy', $slider->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">There is no sliders yet</div>
                @endforelse
            @endisset
            
            


        </tbody>
        </table>

<div class="container">
         <div class="row">
            <div class="col-12 mt-5">
                @if ($sliders->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                        <li class="page-item {{ $sliders->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $sliders->previousPageUrl() }}" aria-label="Previous">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Previous') }} </span>
                            </a>
                        </li>
                        @foreach ( $sliders->getUrlRange(1, $sliders->lastPage()) as $pageLink)
                        @php
                            //fuck you php iam mohamed seabeai
                            $pageString = strstr($pageLink, 'page=' , false);
                            $rev = strrev($pageString);
                            $pageNum = strstr($rev, '=' , true);
                            $pageNum = strrev($pageNum);
                        @endphp
                            <li class="page-item {{ substr($pageLink, -1) == $sliders->currentPage() ? 'active': '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li class="page-item {{  $sliders->currentPage() == $sliders->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $sliders->nextPageUrl() }}" aria-label="Next">
                            <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Next') }} </span>
                        </a>
                        </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>



    </div>

    </div>

@stop