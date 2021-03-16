<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Food &raquo; {{ $item->name }} &raquo; Edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if($errors->any())
                <div class="mb-5" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        There's something wrong
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
                @endif
                <form action="{{ route('food.update', $item->id)}}" class="w-full" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="flex flex-wrap mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                        Name
                                    </label>
                                    <input value="{{ old('name') ?? $item->name }}" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500  @error('name') is-invalid @enderror" id="grid-last-name" type="text" placeholder="User Name">
                                    @error('name')
                                    <span class="invalid-feedback" style="color: red"  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                    Image
                                    </label>
                                    <input name="picturePath" class="@error('picturePath') is-invalid @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="file" placeholder="User Image">
                                    @error('picturePath')
                                    <span class="invalid-feedback" style="color: red"  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                        Description
                                    </label>
                                    {{-- <input value="{{ old('description') }}" name="description" class="@error('description') is-invalid @enderror appearance-none h-20 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-last-name" type="text" placeholder="Food description"> --}}
                                    <textarea name="description" class="@error('description') is-invalid @enderror form-textarea appearance-none h-20 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-last-name" type="text" placeholder="Food description">{{ old('description') ?? $item->description}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" style="color: red"  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                        Ingredients
                                    </label>
                                    {{-- <input value="{{ old('ingredients') }}" name="ingredients" class="@error('ingredients') is-invalid @enderror appearance-none h-20 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Food ingredients"> --}}
                                    <textarea name="ingredients" class="@error('ingredients') is-invalid @enderror appearance-none block w-full bg-gray-200 text-gray-700 text-left border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-last-name" type="text" placeholder="Food ingredients">{{ old('ingredients') ?? $item->ingredients }}</textarea>
                                    <p class="text-gray-600 text-xs italic">Dipisahkan dengan koma, Contoh: Bawang merah, Cabai, Bawang Putih</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-wrap mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                        Price
                                    </label>
                                    <input value="{{ old('price') ?? $item->price }}" name="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="number" placeholder="Food price">
                                </div>
                            </div>
                            <div class="flex flex-wrap mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                        Rate
                                    </label>
                                    <input value="{{ old('rate') ?? $item->rate }}" name="rate" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="number" step="0.01" max="5" placeholder="Food rate">
                                </div>
                            </div>
                            <div class="flex flex-wrap mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                        Types
                                    </label>
                                    <select name="types" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                                        <option value="{{ $item->types }}">{{ $item->types }}</option>
                                        <option value="Recomended">Recomended</option>
                                        <option value="Popular">Popular</option>
                                        <option value="New Food">New Food</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-wrap mx-3 mb-6">
                                    <div class="w-full px-3 text-right">
                                        <a href="{{ route('food.index') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 mx-5 rounded">
                                            Cancel
                                        </a>
                                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            Save
                                        </button>
                                    </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
