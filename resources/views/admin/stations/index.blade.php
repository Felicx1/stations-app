<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

  
<div class="py-12">
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

     <div class="input-group mb-3 search">
                <input type="text" name="search" class="form-control" id="search"
                    placeholder="Search......" aria-label="Search" aria-describedby="button-addon2"/>
    
     </div>

                
<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table table-bordered table-hover" id="mytable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
        
                <th scope="col" class="py-3 px-6">
                   Station Name
                </th>
                <th scope="col" class="py-3 px-6">
                   Station Code
                </th>
                <th scope="col" class="py-3 px-6">
                    Country
                </th>
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <th scope="col" class="py-3 px-6">
                    Number of Recordings
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Action
                </th>
            </tr>

        </thead>
        <tbody class="alldata">
        @foreach ($stations as $station)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $station->station_name }}
            </td>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $station->station_code }}
            </td>
            
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $station->country }}
            </td>
             
             <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $station->stationdate }} 
             </td>
               
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $station->stations }}
                </td>
                <td  scope ="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                 
                 <a href="#_" class="px-4 py-2 bg-blue-500 hover:bg-red-700 rounded-lg text-white">View</a>
                 <a href="#_" class="px-4 py-2 bg-red-500 hover:bg-blue-700 rounded-lg text-white">Refresh/Restore</a>
                 
              </td>

        </tr>

                @endforeach
        
        </tbody>

        <tbody id="Content" class="searchdata"></tbody>
        
         </table>
       
        </div>
        {{ $stations->links()}}
        </div>
</div>


    <script type="text/javascript">


// $('#search').on('keyup',function(){
//         $value=$(this).val();
//         $.ajax({
//         type : 'get',
//         url : '{{URL::to('search')}}',
//         data:{'search':$value},
//         success:function(data){
//         $('tbody').html(data);
//         }
//         });
//         })
    

        $('#search').on('keyup',function() 
        {
         $value=$(this).val();

         if($value)
         {
            
            $('.alldata').hide();
            $('.searchdata').show();

         }
         else {

            $('.alldata').show();
            $('.searchdata').hide();
         }

         

         $.ajax({
 
            headers: {

      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      },
            method:'get',
            url:'{{URL::to("search")}}', 
            data:{'search':$value},

            success:function(data) {
                console.log(data);
                $('#Content').html(data);
            }

        

         });

        })

       

    </script>



</x-admin-layout>
