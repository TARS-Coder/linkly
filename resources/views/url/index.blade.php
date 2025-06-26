<x-app-layout>
    <x-slot name="header">
        <p class="text-[#101518] tracking-light text-[32px] font-bold leading-tight min-w-72">{{ __("All URL's") }}</p>
    </x-slot>
    <x-slot name="newnode">
      @if (auth()->user()->role !== 'superadmin')
        <a href="{{route('url.new')}}" class="flex min-w-[84px] max-w-[480px] items-center text-center overflow-hidden rounded-full h-8 px-4 bg-[#eaedf1] text-[#101518] text-ms font-medium leading-normal">
            <span class="truncate">{{ __('Add new URL')}}</span>
        </a>
      @endif
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
            <div class="px-4 py-3">
              <div class="flex overflow-scroll rounded-xl border border-[#dde1e3] bg-white">
                <table class="flex-1">
                  <thead>
                    <tr class="bg-white">
                      <th class="h-[60px] text-center w-[200px] text-sm font-medium leading-normal">Name/Desc</th>
                      <th class="h-[60px] text-center w-[250px] text-sm font-medium leading-normal">URL short</th>
                      <th class="text-center w-[200px] text-sm font-medium leading-normal">Original URL</th>
                      <th class="text-center w-[200px] text-sm font-medium leading-normal">Click</th>
                      <th class="text-center w-[200px] text-sm font-medium leading-normal">Created by</th>
                      <th class="text-center w-[200px] text-sm font-medium leading-normal">Belongs to</th>
                      @if (auth()->user()->role !== 'superadmin')
                      <th class="text-center w-[200px] text-sm font-medium leading-normal ju">Actions
                      @endif
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($urls as $url)
                    <tr class="border-t border-t-[#dde1e3]">
                      <td class="h-[48px] text-center text-[#121416] text-sm font-normal leading-normal">
                      {{$url->title ? $url->title : 'Blank'}}
                      </td>
                      <td class="h-[48px] text-center text-[#121416] text-sm font-normal leading-normal">
                        <a href="{{ route("url.redirect", $url->short_url) }}" class="text-blue-500 hover:underline" target="_blank">
                          {{ config('app.url')."/v1.1/".$url->short_url }}
                        </a>
                      </td>
                      <td class="text-center text-[#121416] text-sm font-normal leading-normal">
                        {{ Str::limit($url->original_url, 40) }}
                      </td>
                      <td class="text-center text-[#6a7681] text-sm font-normal leading-normal">
                        {{  $url->clicks ? $url->clicks : 0 }}
                      </td>
                      <td class="text-center text-[#6a7681] px-5 text-sm font-normal leading-normal">
                        <a class="flex items-center justify-center min-w-[84px] max-w-[480px] overflow-hidden rounded-full h-8 px-4 {{ optional($url->user)->role === "admin" ? "bg-blue-400" : "bg-[#eaedf1]" }} text-[#121416] text-sm font-medium leading-normal">
                          <span class="truncate">{{ (optional($url->user)->id === auth()->id()) ? "You" : optional($url->user)->name }}</span>
                      </a>
                        
                      </td>
                      <td class="text-center text-[#6a7681] text-sm font-normal leading-normal">
                        {{ ($url->company->name)  }}
                      </td>
                      @if (auth()->user()->role !== 'superadmin')
                      <td class="text-center text-[#6a7681] text-sm font-bold leading-normal tracking-[0.015em]">
                      <form action="{{ route('url.destroy', $url) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Url?');" class="inline">
                          @csrf
                          @method('DELETE')
                      
                          <button type="submit" class="text-red-500 hover:underline">
                              {{ __('Delete') }}
                          </button>
                      </form>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
                </div>
              <div class="p-6">
                  {{ $urls->links() }}
              </div>
            </div>
        </div>
    </div>
</x-app-layout>