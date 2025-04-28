@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-pzjw8f+ua7Kw1TIq0Rpi2OZSEz3pO3l21knNdr7/XZ00oaj4+ynNeC3jpt4pZFOk" crossorigin="anonymous">

<!-- Bootstrap JS (Optional if you want to use JavaScript features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0Rpi2OZSEz3pO3l21knNdr7/XZ00oaj4+ynNeC3jpt4pZFOk" crossorigin="anonymous"></script>

<div class="container-fixed">
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
     <div class="flex flex-col justify-center gap-2">
      <h1 class="text-xl font-medium leading-none text-gray-900">
       User List
      </h1>
      <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
        User List
      </div>
     </div>
    
    </div>
   </div>

   <div class="container-fixed">
    <div class="grid gap-5 lg:gap-7.5">
     <div class="card card-grid min-w-full">
      <div class="card-header">
       <h3 class="card-title">
        User List
       </h3>
       <button class="btn btn-sm btn-primary">
        {{-- <i class="ki-filled ki-exit-down">
        </i> --}}
        <a href="{{route('admin.user.user_create')}}">Create User</a>
       </button>
      </div>
      <div class="card-body">
       <div data-datatable="true" data-datatable-page-size="20">
        <div class="scrollable-x-auto">
         <table class="table table-border" data-datatable-table="true">
          <thead>
           <tr>
            <th class="w-14">
            No
            </th>
            <th class="min-w-[200px]">
                <span class="sort">
                 <span class="sort-label text-gray-700 font-normal">
                  Status
                 </span>
                 <span class="sort-icon">
                 </span>
                </span>
               </th>
            <th class="min-w-[200px]">
             <span class="sort">
              <span class="sort-label text-gray-700 font-normal">
               Name
              </span>
              <span class="sort-icon">
              </span>
             </span>
            </th>
            <th class="w-[170px]">
             <span class="sort">
              <span class="sort-label text-gray-700 font-normal">
               Email
              </span>
              <span class="sort-icon">
              </span>
             </span>
            </th>
            <th class="min-w-[170px]">
             <span class="sort">
              <span class="sort-label text-gray-700 font-normal">
               Mobile Number
              </span>
              <span class="sort-icon">
              </span>
             </span>
            </th>
            {{-- <th class="min-w-[170px]">
             <span class="sort">
              <span class="sort-label text-gray-700 font-normal">
               Address
              </span>
              <span class="sort-icon">
              </span>
             </span>
            </th> --}}
            <th class="min-w-[170px]">
                <span class="sort">
                 <span class="sort-label text-gray-700 font-normal">
                  Action
                 </span>
                 <span class="sort-icon">
                 </span>
                </span>
               </th>
            <th class="w-[100px]">
            </th>
           </tr>
          </thead>
          <tbody>
                    @php
            $startingNumber = ($data->currentPage() - 1) * $data->perPage() + 1;
        @endphp
             
            @foreach ($data as $key => $item)
            <tr>
                <td>
                 {{$startingNumber + $key}}
                </td>
                <td class="text-gray-800 font-normal">
                    @if($item->role_id == 2)
                        Customer
                    @elseif($item->role_id == 3)
                        Publisher
                    @elseif($item->role_id == 4)
                    Content Writer
                    @elseif($item->role_id == 5)
                    Moderation
                    @else
                        Unknown
                    @endif

                </td>
                <td class="text-gray-800 font-normal">
                 {{$item->name}}
                </td>
                <td>
                 <div class="text-gray-800 font-normal">
                  {{$item->email}}
                 </div>
                </td>
                <td class="text-gray-800 font-normal">
                 {{$item->phone}}
                </td>
                {{-- <td class="text-gray-800 font-normal">
                 {{$item->address}}
                </td> --}}
               
                <td class="text-center">
                    <div style="display: flex; gap: 10px;">
                        <a href="{{route('admin.user.edit_user', $item->id)}}" class="btn btn-success" >Edit</a>
                        <form method="post"  action="{{ route('admin.user.delete',['id' => $item->id]) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('do you want to delete it?')" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    
                    
                </td>
               </tr>
            @endforeach
            {{ $data->links() }}

        
         
      
          
         
         
          
          </tbody>
         </table>
        </div>
       
       </div>
      </div>
     </div>
    </div>
   </div>
   
@endsection


