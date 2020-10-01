<template>
  <div>
    <div class="bg-white border-b border-gray-200">
      <div>
        <div class="container mx-auto">
          <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto">
              <div class="min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                  <thead>
                    <tr>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        <a @click="sortParam = 'name'">User</a>
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        <a @click="sortParam = 'fulltime'">Time</a>
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        <a @click="sortParam = 'mentoring'">Mentoring</a>
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        <a @click="sortParam = 'responsibility'"
                          >Responsibility</a
                        >
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        <a @click="sortParam = 'codestyle'">Codestyle</a>
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        <a @click="sortParam = 'results'">Result</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(vote, index) in votes" :key="index">
                      <td
                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
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
                              {{ vote.name }}
                            </p>
                          </div>
                        </div>
                      </td>
                      <td
                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                      >
                        <p class="text-gray-900 whitespace-no-wrap text-center">
                          {{ vote.fulltime }}
                        </p>
                      </td>
                      <td
                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                      >
                        <p class="text-gray-900 whitespace-no-wrap text-center">
                          {{ vote.mentoring }}
                        </p>
                      </td>
                      <td
                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                      >
                        <p class="text-gray-900 whitespace-no-wrap text-center">
                          {{ vote.responsibility }}
                        </p>
                      </td>
                      <td
                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                      >
                        <p class="text-gray-900 whitespace-no-wrap text-center">
                          {{ vote.codestyle }}
                        </p>
                      </td>
                      <td
                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                      >
                        <p class="text-gray-900 whitespace-no-wrap text-center">
                          {{ vote.result }}
                        </p>
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
    sortParam: "";
    return {
      votes: [],
    };
  },
  mounted() {
    this.getVotes();
  },
    computed: {
      sortedList() {
        switch (this.sortParam) {
        case 'name': return this.votes.sort(sortByName);
        case 'fulltime': return this.votes.sort(sortByFulltime);
        case 'mentoring': return this.votes.sort(sortByMentoring);
        case 'responsibility': return this.votes.sort(sortByResponsibility);
        case 'codestyle': return this.votes.sort(sortByCodestyle);
        case 'results': return this.votes.sort(sortByResults);
        default: return this.votes;
        }
      }
    },

  components: {
    JetApplicationLogo,
  },
  methods: {
    getVotes() {
      axios
        .get("/results")
        .then((response) => {
          const votes = response.data;
          this.votes = votes;
          console.log(this.votes);
        })
        .catch((error) => console.log(error));
    },

    // sortBy() {
    //   console.log("sortByLog", this.votes.sort());
    // },
  },
};

var sortByName = function (d1, d2) {return (d1.name.toLowerCase() > d2.name.toLowerCase()) ? 1 : -1;};
var sortByFulltime = function (d1, d2) {return (d1.fulltime.toLowerCase() > d2.fulltime.toLowerCase()) ? 1 : -1;};
var sortByMentoring = function (d1, d2) {return (d1.mentoring.toLowerCase() > d2.mentoring.toLowerCase()) ? 1 : -1;};
var sortByResponsibility = function (d1, d2) {return (d1.responsibility.toLowerCase() > d2.responsibility.toLowerCase()) ? 1 : -1;};
var sortByCodestyle = function (d1, d2) {return (d1.codestyle.toLowerCase() > d2.codestyle.toLowerCase()) ? 1 : -1;};
var sortByResults = function (d1, d2) {return (d1.results.toLowerCase() > d2.results.toLowerCase()) ? 1 : -1;};

</script>
