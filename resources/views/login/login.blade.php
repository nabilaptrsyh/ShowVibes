<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
</head>


<body>

    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        <!-- Login Container -->
        <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
            <!-- Form -->
            <div class="md:w-1/2 px-16">
                <h2 class="font-bold text-2xl text-[#120e49]">Login</h2>
                <p class="text-sm mt-4 text-[#120e49]">If you already have an account, easily log in</p>

                <form action="/login" method="post" class="flex flex-col gap-4">
                    @csrf
                    <input class="p-2 mt-8 rounded-xl border" id="email" type="email" name="email" placeholder="name@example.com" autocomplete="email" autofocus required value="{{ old('email') }}" @error('email') is-invalid @enderror>
                    <div class="relative">
                        <input class="p-2 rounded-xl border w-full" id="password" type="password" name="password" autocomplete="current-password" placeholder="Password">
                        <svg class="absolute top-1/2 right-3 -translate-y-1/2" width="24" height="24"
                            xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="grey"><path
                                d="M12.01 20c-5.065 0-9.586-4.211-12.01-8.424 2.418-4.103 6.943-7.576 12.01-7.576 5.135 0 9.635 3.453 11.999 7.564-2.241 4.43-6.726 8.436-11.999 8.436zm-10.842-8.416c.843 1.331 5.018 7.416 10.842 7.416 6.305 0 10.112-6.103 10.851-7.405-.772-1.198-4.606-6.595-10.851-6.595-6.116 0-10.025 5.355-10.842 6.584zm10.832-4.584c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5zm0 1c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4z" />
                        </svg>
                    </div>
                    <button class="bg-[#120e49] rounded-xl text-white py-2 hover:scale-105 duration-300" type="submit">Log In</button>
                </form>
            <small class="d-block text-center mt-3">
              Not Registered?<a href="/register" class="text-decoration-none">Register Now</a>
            </small>
                <div class="mt-10 grid grid-cols-3 items-center text-gray-400">
                    <hr class="border-gray-400">
                    <p class="text-center text-sm">OR</p>
                    <hr class="border-gray-400">
                </div>

                <a href="{{ route('google.login') }}">
                <button
                    class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300">
                    <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="20px" preserveAspectRatio="xMidYMid"
                        viewBox="0 0 256 262" id="google"><path fill="#4285F4"
                            d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"></path><path
                            fill="#34A853"
                            d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"></path><path
                            fill="#FBBC05"
                            d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"></path><path
                            fill="#EB4335"
                            d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"></path></svg>Login with Google</button>
                </a>
                <p class="mt-5 text-xs border-b border-gray-400 py-4">Forgot Your Password?</p>

                <div class="mt-3 text-xs flex justify-between items-center">
                    <p>Don't have an account?</p>
                    <a href="/register"><button class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Register</button></a>
                </div>

            </div>
            <!-- Image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl" src="{{ asset('login-copy.jpeg') }}" alt="">
            </div>

        </div>

    </section>

</body>

</html>
