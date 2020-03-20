@extends('layouts.app')

@section('content')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Broadcast to {{ $contacts_count }} contacts</h3>
        </div>
        <form method="POST" action="{{ route('notification.create') }}">
            @csrf
            <dl>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Message
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        <label for="infos"></label>
                        <textarea name="message" id="infos" rows="5" placeholder="broadcast a message..." class="bg-gray-200 shadow appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500"></textarea>
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500"></dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        <button type="submit" class="w-full shadow bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Envoyer
                        </button>
                    </dd>
                </div>
            </dl>
        </form>
    </div>
@endsection
