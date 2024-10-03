<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>
<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<form method="POST" action='/jobs' >
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Crate Job</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Gimme data</p>
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
           <x-form-label for="title">Title
          </x-form-label>

            <div class="mt-2">
<x-form-input name="title" id="title" placeholder="Pizza Man" required></x-form-input>
            </div>
            <x-form-error name= "title"/>

          </x-form-field>
          <x-form-field>
            <x-form-label for="salary">Salary
           </x-form-label>
 
             <div class="mt-2">
 <x-form-input name="salary" id="salary" placeholder="50K USD" required></x-form-input>
             </div>
             <x-form-error name= "salary"/>
 
           </x-form-field>
        </div>
          <div class="mt-10">

            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <li class="text-red-500 italic">{{$error}}</li>
            @endforeach
            
            @endif
          </div>
      </div>
  
        </div>
      </div>
      
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <x-form-button>Save</x-form-button>
      </div>
    </div>
    </form>
  

</x-layout>