<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 w-full inline-block align-middle">
        <div class="border rounded-lg overflow-hidden">
          <table class="w-full divide-y divide-gray-200 bg-white">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Id</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Amount</th>
                <th scope="col" class="px-6 py-3 text-ceter text-xs font-medium text-gray-500 uppercase">Created at</th> 
                <th scope="col" class="px-6 py-3 text-ceter text-xs font-medium text-gray-500 uppercase">Action</th> 
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($orders as $order)
                    
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-gray-800">{{$order->order_id}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{$order->status}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{$order->total_amount}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{$order->created_at}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-ceter text-sm text-center font-medium">
                  <button type="button" class="inline-flex items-center gap-x-2 text-sm text-center font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</button>
                </td>
              </tr>
                @endforeach
   
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>