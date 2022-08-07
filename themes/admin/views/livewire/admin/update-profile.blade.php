  <div class="bg-white p-3 shadow-2xl rounded-md">
      <div class="px-4 py-5 bg-white">

          <div class="grid grid-cols-4 gap-6">
              <!-- Profile Photo -->
              <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 dark:text-gray-200">

                  <!-- Profile Photo File Input -->
                  <input type="file" class="hidden" wire:model="profile_pic" x-ref="profile_pic" x-on:change="

                                    photoName = $refs.profile_pic.files[0].name;

                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.profile_pic.files[0]);
                            ">

                  <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="photo">

                      Photo
                  </label>

                  <!-- Current Profile Photo -->
                  <div class="mt-2" x-show="! photoPreview">
                  </div>

                  <!-- New Profile Photo Preview -->
                  <div class="mt-2" x-show="photoPreview" style="display: none;">
                      <span class="block rounded-full w-20 h-20" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                      </span>
                  </div>

                  <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray mt-2 mr-2" x-on:click.prevent="$refs.profile_pic.click()">


                      Select A New Photo
                  </button>


              </div>

              <!-- Name -->
              <div class="col-span-6 sm:col-span-4">
                  <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="name">

                      Name
                  </label>
                  <input class="form-input rounded-md shadow-sm mt-1 block w-full dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray" value="{{ old('name', $name) }}" id="name" type="text" wire:model.lazy="name" autocomplete="name">
                  @error('name')
                  <span class="text-red-500 mt-1">{{ $message }}</span>
                  @enderror
              </div>




              <!-- Email -->
              <div class="col-span-6 sm:col-span-4">
                  <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="email">

                      Email
                  </label>
                  <input class="form-input rounded-md shadow-sm mt-1 block w-full dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray" id="email" value="{{ old('email', $email) }}" type="email" wire:model.defer="email">
                  @error('email')
                  <span class="text-red-500 mt-1">{{ $message }}</span>
                  @enderror

              </div>

              <!-- Password -->
              <div class="col-span-6 sm:col-span-4">
                  <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="password">

                  Password
                  </label>
                  <input class="form-input rounded-md shadow-sm mt-1 block w-full dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray" id="password" type="password" value="" wire:model.defer="password">
                  @error('password')
                  <span class="text-red-500 mt-1">{{ $message }}</span>
                  @enderror

              </div>

          </div>
      </div>
      <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 dark:bg-gray-800">

          <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('IEc2xxLTGLMVPwHyA8zM').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.opacity.out.duration.1500ms="shown" style="display: none;" class="text-sm text-gray-600 mr-3">
              Saved.
          </div>

          <button type="submit" wire:click.prevent="updateProfile()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="profile_pic">
              Save
          </button>
      </div>

  </div>
