@extends('layouts.app')

@section('content')
    @if(isset($failed) && !empty($failed))
        <div class="w-full">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-white text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                                Number
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-white text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                                Exception
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($failed as $f)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900">
                                                {{ $f['number'] }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $f['exception']  }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
