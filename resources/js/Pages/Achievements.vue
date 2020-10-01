<template>
  <app-layout>
    <!-- Page Heading -->
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot name="header">
          <h2 class="text-2xl font-semibold ml-5 leading-tight">Achievements</h2>
        </slot>
      </div>
    </header>

    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-2 mb-6 flex sm:flex-row flex-col">
          <div class="flex flex-row mb-8 sm:mb-0 ml-5"></div>
        </div>

        <!-- Table into the card -->

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <achievement-table />
        </div>

        <button
          class="block uppercase mx-auto mt-5 shadow bg-indigo-800 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded"
        >Submit</button>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";
import AchievementTable from "./../Jetstream/AchievementTable";

export default {
  components: {
    AppLayout,
    AchievementTable,
  },
};
</script>
