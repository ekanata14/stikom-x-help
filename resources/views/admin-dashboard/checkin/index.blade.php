<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- User Detail --}}
                    <button data-modal-target="checkin-modal" data-modal-toggle="checkin-modal"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button" onclick="openCamera()">
                        Check In
                    </button>

                    <!-- Main modal -->
                    <div id="checkin-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Checkin
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="checkin-modal" onclick="stopCamera()">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4 flex justify-center">
                                    <!-- Success message when QR code is detected -->
                                    <div id="qr-detected-message" class="qr-detected-message">QR Code Detected!</div>

                                    <!-- Video element for live camera feed -->
                                    {{-- <video id="cameraFeed" autoplay playsinline
                                        class="rounded-lg border border-gray-300"
                                        style="width: 100%; max-width: 400px;"></video>
                                    <div style="width: 500px" id="reader"></div> --}}

                                    <div id="qr-scanner-container" style="width: 100%; height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-blue-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Complete Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Mobile Phone
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Institution
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checkIns as $item)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration + ($checkIns->currentPage() - 1) * $checkIns->perPage() }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->user->complete_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->user->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->user->mobile_phone }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->user->institution }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-4">
                                            {{-- <x-button href="{{ route('users.edit', $item->id) }}" variant="warning"
                                                class="justify-center max-w-xs gap-2">
                                                <span>Edit</span>
                                            </x-button>
                                            <form action="{{ route('users.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('{{ __('Are you sure you want to delete this user?') }}');">
                                                @csrf
                                                @method('DELETE')

                                                <x-button variant="danger">
                                                    <x-heroicon-o-trash class="w-5 h-5" aria-hidden="true" />
                                                    {{ __('Delete') }}
                                                </x-button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No users found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $checkIns->links() }} <!-- Menampilkan link pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="assets/js/html5-qrcode.min.js"></script>
<script>
    let html5QrCode;

    function openCamera() {
        const videoElement = document.getElementById('qr-scanner-container');

        // Initialize the QR code scanner
        html5QrCode = new Html5Qrcode("qr-scanner-container");

        // Start scanning the QR code from the camera
        html5QrCode.start({
                facingMode: "environment"
            }, // Camera facing mode (rear camera)
            {
                fps: 10, // Frames per second for scanning
                qrbox: 250 // The scanning box size
            },
            qrCode => {
                // When a QR code is detected, handle the result
                console.log("QR Code detected: ", qrCode);
                fetch('{{ env('APP_URL') }}api/checkin/store', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            user_id: qrCode
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the server response
                        if (data) {
                            Swal.fire({
                                title: 'Success',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK',
                                timer: 5000
                            });
                            setTimeout(() => {
                                openCamera();
                            }, 2000); // Set timeout for 2 seconds before reopening the camera
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error',
                            text: "Checkin Error",
                            icon: 'error',
                            confirmButtonText: 'OK',
                            timer: 5000
                        });
                    });

                // Stop scanning after a successful detection (optional)
                html5QrCode.stop().then(() => {
                    console.log("QR Code scan stopped");
                }).catch(err => {
                    console.error("Error stopping scanner", err);
                });

                // You can send qrCode to your server for further processing here
                // postQrCodeData(qrCode);
            },
            errorMessage => {
                // If you need to display any error message, you can use this
                // console.warn("QR code scan error: ", errorMessage);
            }
        ).catch(err => {
            console.error("Error starting QR code scanner: ", err);
        });
    }

    function postQrCodeData(qrCode) {
        fetch('http://localhost:8000/api/qr-check', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': {{ csrf_token() }}
                },
                body: JSON.stringify({
                    qrCode: qrCode // Send the QR code data
                })
            })
            .then(response => response.json())
            .then(data => {
                // Handle the server response
                if (data.qrCode) {
                    console.log("QR Code data received from server: ", data.qrCode);
                }
            })
            .catch(error => {
                console.error("Error posting QR code data:", error);
            });
    }

    function stopCamera() {
        if (html5QrCode) {
            html5QrCode.stop().then(() => {
                console.log("Camera stopped successfully.");
            }).catch(err => {
                console.error("Error stopping camera: ", err);
            });
        }
    }
</script>
