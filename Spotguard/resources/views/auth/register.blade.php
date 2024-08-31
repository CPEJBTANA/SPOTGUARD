<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="flex mt-4">
                <div class="w-1/2  ">
                    <x-label for="first_name" value="{{ __('First Name') }}" />
                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                        required autofocus autocomplete="first_name" />

                </div>

                <div class="w-1/4 ml-4">
                    <x-label for="middle_name" value="{{ __('Middle Name') }}" />
                    <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name"
                        :value="old('middle_name')" autocomplete="middle_name" />
                </div>

                <div class="w-1/2 ml-4">
                    <x-label for="last_name" value="{{ __('Last Name') }}" />
                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                        required autocomplete="last_name" />
                </div>
            </div>

            <div class="flex mt-4">
                <div class="w-1/4">
                    <x-label for="birth_date" value="{{ __('Birth Date ') }}" />
                    <x-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date"
                        :value="old('birth_date')" required autocomplete="birth_date" />
                </div>

                <div class="w-full ml-4">
                    <x-label for="mobile_number" value="{{ __('Mobile Number  *') }}" />
                    <x-input id="mobile_number" pattern="\+63[0-9]{10}"
                        oninput="this.value = this.value.replace(/[^0-9+]/g, '').substring(0, 13);"
                        class="block mt-1 w-full" placeholder="+63" type="text" name="mobile_number"
                        :value="old('mobile_number', '+63')" required title="Please enter exactly 13 chars starting with +63." />
                </div>
            </div>


            <div class="mt-4">
                <x-label for="address" value="{{ __('Address') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    autocomplete="address" />
            </div>

            <div class="flex mt-4">
                <div class="w-1/2  ">
                    <x-label for="car_brand" value="{{ __('Card Brand') }}" />
                    <x-input id="car_brand" class="block mt-1 w-full" type="text" name="car_brand" :value="old('car_brand')"
                        autocomplete="car_brand" />
                </div>
                <div class="w-1/2  ml-4">
                    <x-label for="body_type_id" value="{{ __('Car Body Type') }}" />
                    <select id="body_type_id" class="block mt-1 w-full" name="body_type_id" required>
                        @foreach ($body_types as $type)
                            <option value="{{ $type->id }}"
                                {{ old('body_type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex mt-4">
                <div class="w-1/2  ">
                    <x-label for="car_color" value="{{ __('Car Color') }}" />
                    <x-input id="car_color" class="block mt-1 w-full" type="text" name="car_color" :value="old('car_color')"
                        autocomplete="car_color" />
                </div>
                <div class="w-1/2  ml-4">
                    <x-label for="car_license_plate" value="{{ __('Car License Plate Number') }}" />
                    <x-input id="car_license_plate" class="block mt-1 w-full" type="text" name="car_license_plate"
                        :value="old('car_license_plate')" autocomplete="car_license_plate" />
                </div>
            </div>


            <div class="mt-6">
                <x-label for="username" value="{{ __('Username') }}" />
                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                    required autocomplete="username" />
            </div>

 
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
