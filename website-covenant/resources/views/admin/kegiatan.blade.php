<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="containerKegiatan">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="titleKegiatan card-header">Kegiatan</div>
                    <!-- <div class="card-body">
                    <p>You are in Kegiatan Page</p>
                </div> -->
                </div>
                <!-- <a href="/kegiatans/create">Create new kegiatan</a> -->
                <!-- Blade Template for Kegiatan -->
                <!-- <h1>Kegiatan</h1> -->
                <form action="/kegiatan" method="post" enctype="multipart/form-data">
                    @csrf
                    <a class="cardForm block m-10 p-6 bg-white border border-gray-200 rounded-lg shadow ">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="nama_kegiatan"
                                    class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                                    class="formKegiatan kegiatan bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Nama Kegiatan" required>
                            </div>
                        </div>
                        <div class="containerTWO flex mb-10">
                            <div class=" mb-6 md:mr-6 w-auto">
                                <label for="jadwal"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                <input type="date" id="jadwal" name="jadwal"
                                    class="formjadwal bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>

                            <div class="mb-6 md:mr-6">
                                <label for="waktu"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                <input type="time" id="waktu" name="waktu"
                                    class="formWaktu bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="penyelenggara"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                    <input type="text" id="penyelenggara" name="penyelenggara"
                                        class="formOleh bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Penyelenggara" required>
                                </div>
                            </div>

                        </div>
                        <div class="containerLD flex mb-10">
                            <div class="grid mb-6 md:grid-cols-2">
                                <div>
                                    <label for="lokasi"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                    <input type="text" id="lokasi" name="lokasi"
                                        class="formLokasi bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Lokasi" required>
                                </div>
                            </div>

                            <div class="grid mb-6 md:grid-cols-2">
                                <div>
                                    <label for="deskripsi"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                    <input type="text" id="deskripsi" name="deskripsi"
                                        class="formDesc bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Deskripsi" required>
                                </div>
                            </div>
                        </div>

                        Volunteer
                        <select name="volunteer_id">
                            @foreach ($volunteers as $volunteer)
                            <option value='{{$volunteer->id}}'>{{$volunteer->nama}}</option>
                            @endforeach
                        </select>

                        <br />
                        Sponsor - Penanggung Jawab
                        <select name="sponsor_id">
                            @foreach ($sponsors as $sponsor)
                            <option value='{{$sponsor->id}}'>{{$sponsor->instansi}} - {{$sponsor->penanggung_jawab}}
                            </option>
                            @endforeach
                        </select>


                        <!-- Add other fields similar to the example provided -->
                        <br />
                        <button type="submit"
                            class="btnFormKegiatan items-center justify-center text-black bg-yellow-100 hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </a>
                </form>


                <div class="tableKegiatan overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                        <thead class="text-xs text-black uppercase bg-yellow-100 dark:text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Kegiatan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Waktu
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Penyelenggara
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Lokasi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sukarelawan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sponsor - Penanggung Jawab
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cover
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Foto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kegiatans as $index => $event)
                            <tr class="bg-blue-500 border-b border-blue-400">
                                <td class="px-6 py-4">
                                    {{ $index + 1}}
                                </td>
                                <td class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                    {{ $event->nama_kegiatan }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $event->jadwal }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $event->waktu }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $event->penyelenggara }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $event->lokasi }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $event->deskripsi }}
                                </td>
                                <td class="px-6 py-4">
                                    @foreach($event->volunteers as $one_volunteer)
                                    {{ $one_volunteer->nama }} 
                                    <br />
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">
                                    @foreach($event->sponsors as $one_sponsor)
                                    {{ $one_sponsor->instansi }} - {{$one_sponsor->penanggung_jawab}}
                                    <br />
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">
                                <img src="{{asset('storage/' . $event->cover)}}" style="width: 300px"/>
                                </td>
                                <td class="px-6 py-4">
                                <img src="{{asset('storage/' . $event->photo)}}" style="width: 300px"/>
                                </td>

                                <td class="px-6 py-4">
                                    <a href="/kegiatan/{{ $event->id }}/edit"
                                        class="font-medium text-white hover:underline">EDIT</a> |
                                    <form action="/kegiatan/{{ $event->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

</body>

</html>