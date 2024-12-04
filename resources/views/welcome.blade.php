<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Smart Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;   
        }
        html {
             scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-gradient-to-r from-teal-500 to-blue-500 fixed top-0 w-full z-50 shadow-md">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between p-4">
        <!-- Logo -->
        <a href="#" class="flex items-center">
            <span class="ml-2 text-2xl font-semibold text-white">upBook</span>
        </a>
        <!-- Navbar Links -->
        <div class="hidden md:flex items-center space-x-6">
            <a href="#hero" class="text-white hover:text-yellow-400 transition">Home</a>
            <a href="#available-courses" class="text-white hover:text-yellow-400 transition">About Us</a>
            <a href="#about-us" class="text-white hover:text-yellow-400 transition">All Courses</a>
            <a href="#footer" class="text-white hover:text-yellow-400 transition">Contact</a>
            <button 
                data-modal-target="start-learning-modal" 
                data-modal-toggle="start-learning-modal"
                class="bg-yellow-400 text-gray-900 px-4 py-2 rounded-full hover:bg-yellow-500 transition">
                Start Learning
            </button>
        </div>
    </div>
</nav>

<!-- Hero Section -->
{{-- <section class="relative bg-cover bg-center h-screen" style="background-image: url('path/to/your/image.jpg');">
        <div class="absolute inset-0 bg-gray-800 bg-opacity-60 backdrop-blur-md"></div>
        <div class="container mx-auto px-4 py-32 relative z-10 ml-4 text-white">
            <div class="text-lg uppercase mt-28 animate-fade-in">Welcome To upBook</div>
            <h1 class="text-5xl font-bold mt-4 break-words w-full max-w-3xl leading-relaxed animate-slide-in">
                The world may change, but knowledge remains timeless
            </h1>
            <p class="mt-4 text-lg animate-fade-in-delayed">A Place Where You Can Find Materials to Learn that you need.</p>
            <div class="mt-8">
                <a class="bg-yellow-500 text-gray-900 px-6 py-3 rounded-full mr-4 hover:bg-yellow-600 transition" href="#">Start Course</a>
                <a class="text-white underline hover:text-yellow-400 transition" href="#">All Courses</a>
            </div>
        </div>
    </section> --}}
    <section class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('images/upBook_Landing.jpg') }}');">
        <div class="absolute inset-0 bg-gray-800 bg-opacity-60 "></div>
        <div class="container mx-auto px-4 py-32 relative z-10 ml-4 text-white">
            <div class="text-lg uppercase mt-28 animate-fade-in">Welcome To upBook</div>
            <h1 class="text-5xl font-bold mt-4 break-words w-full max-w-3xl leading-relaxed animate-slide-in">
                The world may change, but knowledge remains timeless
            </h1>
            <p class="mt-4 text-lg animate-fade-in-delayed">A Place Where You Can Find Materials to Learn that you need.</p>
            <div class="mt-8">
                <a class="bg-yellow-500 text-gray-900 px-6 py-3 rounded-full mr-4 hover:bg-yellow-600 transition" href="#">Start Course</a>
                <a class="text-white underline hover:text-yellow-400 transition" href="#">All Courses</a>
            </div>
        </div>
    </section>

<!-- Available Courses -->
<section id="available-courses" class="container mx-auto mt-10 px-4">
    <h2 class="text-3xl font-bold text-center mb-6">Available Courses</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($courses as $course)
            <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-800">{{ $course->course_name }}</h3>
                <p class="mt-2 text-gray-600">{{ $course->description }}</p>
                <a href="{{ route('courses.show', $course->id) }}" class="text-blue-500 mt-4 inline-block hover:underline">View Details</a>
            </div>
        @endforeach
    </div>
</section>

<!-- About Us -->
<section id="about-us" class="bg-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">About Us</h2>
        <p class="text-lg text-gray-700">upBook is your trusted platform for finding curated learning materials. Our mission is to make knowledge accessible to everyone, helping you grow in your academic and personal pursuits.
            here are some of the student testimony:
        </p>
    </div>
    <div class="container mx-auto px-4">
        <div class="text-center">
         </p>
        </div>
        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
         <div class="bg-white shadow-lg p-6 rounded text-center">
          <p class="text-gray-600">
           "Data sains is matakuliah kesukaanku, dengan matkul itu aku menjadi pintar desain."
          </p>
          <h3 class="mt-4 text-xl font-bold text-gray-800">
           Abel Eka Putra
          </h3>
          <img alt="Student Image" class="w-24 h-24 rounded-full mx-auto mt-4" height="100" src="https://storage.googleapis.com/a1aa/image/LRZcmgv5KrrlCl4gpHdMHncVeLvcHyAUIW0DPSUlOvCERT7JA.jpg" width="100"/>
         </div>
         <div class="bg-white shadow-lg p-6 rounded text-center">
          <p class="text-gray-600">
           "Apakah kode ini legit punya sang debelober?, p adu web."
          </p>
          <h3 class="mt-4 text-xl font-bold text-gray-800">
            Rezky Bobbyanto
          </h3>
          <img alt="Student Image" class="w-24 h-24 rounded-full mx-auto mt-4" height="100" src="images/online.jpg" width="100"/>
         </div>
         <div class="bg-white shadow-lg p-6 rounded text-center">
          <p class="text-gray-600">
           "Set the seas Ablaze."
          </p>
          <h3 class="mt-4 text-xl font-bold text-gray-800">
           firefly
          </h3>
          <img alt="Student Image" class="w-24 h-24 rounded-full mx-auto mt-4" height="100" src="images/course.jpg" width="100"/>
         </div>
        </div>
       </div>
</section>

<!-- Footer -->
<footer id="footer" class="bg-gray-900 text-white py-6">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 upBook. All rights reserved.</p>
    </div>
    <div class="mt-4 flex justify-center space-x-6">
        <a href="#" class="text-blue-400 hover:text-blue-600"><i class="fab fa-facebook"></i></a>
        <a href="#" class="text-pink-400 hover:text-pink-600"><i class="fab fa-instagram"></i></a>
        <a href="#" class="text-blue-300 hover:text-blue-500"><i class="fab fa-twitter"></i></a>
    </div>
</footer>

<!-- Start Learning Modal -->
<div id="start-learning-modal" tabindex="-1" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <button class="absolute top-2 right-2 text-gray-400 hover:text-gray-600" onclick="document.getElementById('start-learning-modal').classList.add('hidden');">
            <i class="fas fa-times"></i>
        </button>
        <h3 class="text-lg font-semibold text-gray-800">Start Learning</h3>
        <p class="mt-2 text-gray-600">Do you already have an account?</p>
        <div class="mt-6">
            <a href="{{ route('login') }}" class="block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-2 text-center">Login</a>
            <a href="{{ route('register') }}" class="block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-center">Register</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalToggleButtons = document.querySelectorAll('[data-modal-toggle]');
        const modal = document.getElementById('start-learning-modal');

        modalToggleButtons.forEach(button => {
            button.addEventListener('click', function () {
                modal.classList.toggle('hidden');
            });
        });
    });
</script>

</body>
</html>
