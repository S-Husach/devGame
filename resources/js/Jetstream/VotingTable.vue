<template>
  <div>
    <div class="bg-white border-b border-gray-200">
      <div>
        <div class="container mx-auto">
          <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto">
              <div class="min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal" ref="votingtable">
                  <thead>
                    <tr>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        Users
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        Mentoring
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        Responsibility
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        Codestyle
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user, index) in users" :key="index">
                      <td
                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                        v-if="user.name != $page.user.name"
                      >
                        <div class="flex items-center">
                          <div class="flex-shrink-0 w-10 h-10">
                            <img
                              class="w-full h-full rounded-full"
                              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                              alt
                            />
                          </div>
                          <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap">
                              {{ user.name }}
                            </p>
                          </div>
                        </div>
                      </td>
                      <td
                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                        v-if="user.name != $page.user.name"
                      >
                        <label class="flex justify-center items-start">
                          <div
                            class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500"
                          >
                            <input
                              type="checkbox"
                              class="opacity-0 absolute"
                              v-model="voteForm[user.id].mentoring"
                            />
                            <svg
                              class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none"
                              viewBox="0 0 20 20"
                            >
                              <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                            </svg>
                          </div>
                        </label>
                      </td>
                      <td
                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                        v-if="user.name != $page.user.name"
                      >
                        <label class="flex justify-center items-start">
                          <div
                            class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500"
                          >
                            <input
                              type="checkbox"
                              class="opacity-0 absolute"
                              v-model="voteForm[user.id].responsibility"
                            />
                            <svg
                              class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none"
                              viewBox="0 0 20 20"
                            >
                              <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                            </svg>
                          </div>
                        </label>
                      </td>
                      <td
                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                        v-if="user.name != $page.user.name"
                      >
                        <label class="flex justify-center items-start">
                          <div
                            class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500"
                          >
                            <input
                              type="checkbox"
                              class="opacity-0 absolute"
                              v-model="voteForm[user.id].codestyle"
                            />
                            <svg
                              class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none"
                              viewBox="0 0 20 20"
                            >
                              <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                            </svg>
                          </div>
                        </label>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import JetApplicationLogo from "./../Jetstream/ApplicationLogo";

export default {
  data() {
    return {
      users: [],
      voteForm: [],
    };
  },

  mounted() {
    this.getUsers();
    this.$on("submitForm", () => {
      this.submitForm();
    });
  },

  methods: {
    getUsers() {
      axios
        .get("/users")
        .then((response) => {
          const users = response.data;
          this.users = users;

          for (const index in users) {
            this.voteForm[users[index].id] = {
              id: users[index].id,
              mentoring: false,
              responsibility: false,
              codestyle: false,
            };
          }
        })
        .catch((error) => console.log(error));
    },

    submitForm() {
      var filteredVoteResults = this.voteForm.filter(
        (e) => e.mentoring || e.responsibility || e.codestyle !== false
      );
      axios
      .post("/votes", filteredVoteResults)
      .then((response) => {
      console.log('new vote added')
      })
      .catch((error) => console.log('axios error', error));
    },
  },

  components: {
    JetApplicationLogo,
  },
};
</script>

<style>
input:checked + svg {
  display: block;
}
</style>
