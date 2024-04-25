<!-- dashboard.blade.php -->
@extends('layoutsDash.app')

@section('content')
<div class="container mx-auto py-8">

    @if ($errors->any())
    <div class="bg-red-700 text-white p-4 rounded-lg mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <h1 class="text-2xl font-bold mb-4">Liste des Utilisateurs</h1>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-2 border-green-400  ">
            <thead>
                <tr class="border-green-400">
                    <th class="border border-green-400 px-4 py-2">Actions</th>
                    <th class="border border-green-400 px-4 py-2">Prénom</th>
                    <th class="border border-green-400 px-4 py-2">Nom</th>
                    <th class="border border-green-400 px-4 py-2">Téléphone</th>
                    <th class="border border-green-400 px-4 py-2">Email</th>
                    <th class="border border-green-400 px-4 py-2">Rôle</th>
                    <th class="border border-green-400 px-4 py-2">Avatar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listeUsers as $user)
                <tr class="border border-green-400-green-400">
                    <td class="border border-green-400 px-4 py-2"><img src=" {{ $user->avatar ? asset($user->avatar) : "https://via.placeholder.com/50"}}" alt="Avatar" class="w-10 h-10 rounded-full"></td>
                    <td class="border border-green-400 px-4 py-2">{{ $user->firstname }}</td>
                    <td class="border border-green-400 px-4 py-2">{{ $user->lastname }}</td>
                    <td class="border border-green-400 px-4 py-2">{{ $user->phone }}</td>
                    <td class="border border-green-400 px-4 py-2">{{ $user->email }}</td>
                    <td class="border border-green-400 px-4 py-2">{{ $user->role->name }}</td>

                    <td class="border border-green-400 px-4 py-2">
                        <form action="{{ route('DeleteUsers',$user->id) }} " method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Vous etes sur vous voulez supprimer ce utilisateur')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        
                        

<!-- Modal toggle -->
<button data-modal-target="authentication-modal{{$user->id}}" data-modal-toggle="authentication-modal{{$user->id}}" class="text-green-700" type="button">
    <i class="fas fa-edit"></i>
</button>
  
             <!-- Main modal -->
 
  
                    </td>
                </tr>
                <div id="authentication-modal{{$user->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h1>update user infos</h1>
                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal{{$user->id}}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <form class="space-y-4" action="{{ route('updateUsers',$user->id) }} " method="POST" enctype="multipart/form-data">
                                    @csrf

                                    @method('PUT')


                                    <label for="role_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                    <select id="role_id" name="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                     @foreach($roles as $role)
                                        <option value="{{$role->id}}" >{{$role->name}}  </option>
                                        @endforeach
                                    </select>

                                    <div>
                                        <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom</label>
                                        <input type="text" value="{{$user->firstname}}" name="firstname" id="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Prenom"  />
                                        @error('firstname')
                                       <span class=" text-red-700 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div>

                                        <label for="avatar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Avatar</label>
                                        <input type="file" name="avatar" id="avatar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Prenom"  />
                                        @error('avatar')
                                       <span class=" text-red-700 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                        <input type="text" value="{{$user->lastname}}" name="lastname" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nom"  />
                                        @error('lastname')
                                       <span class=" text-red-700 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="phone" class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">Numero Telephone</label>
                                        <input type="text" value="{{$user->phone}}" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Telephone +212641725930"  />
                                        @error('phone')
                                       <span class=" text-red-700 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="email" class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="text" value="{{$user->email}}" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Email"  />
                                        @error('email')
                                       <span class=" text-red-700 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                   
                                   
                                    <button type="submit" class="w-full text-white mt-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update user</button>
                                   
                                </form>
                            </div>

                        </div>
                    </div>
                </div> 
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="pagination-links" class="text-center">
        <p>{{ $listeUsers->links() }}</p>  
      </div>
</div>
@endsection
