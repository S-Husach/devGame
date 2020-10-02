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
                        <a @click="sortBy('name')">User</a>
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        <a @click="sortBy('fulltime')">Time</a>
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        <a @click="sortBy('mentoring')">Mentoring</a>
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        <a @click="sortBy('responsibility')">Responsibility</a>
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        <a @click="sortBy('codestyle')">Codestyle</a>
                      </th>
                      <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-green-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                      >
                        <a @click="sortBy('results')">Result</a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr v-for="(vote, index) in paginatedData" :key="index">
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
    // sortParam: "";
    return {
      size: 10,
      votes: [],
      pageNumber: 0,
    };
  },
  mounted() {
    this.getVotes();
    this.$on("prevPage", () => {
      this.prevPage();
    });
    this.$on("nextPage", () => {
      this.nextPage();
    });
  },

  computed: {
    pageCount(){
        let l = this.votes.length,
            s = this.size;
        return Math.ceil(l/s);
    },

    paginatedData(){
        const start = this.pageNumber * this.size,
            end = start + this.size;
        return this.votes.slice(start, end);
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
        //   console.log(this.votes);
        })
        .catch((error) => console.log(error));
    },

    sortBy(column) {
      switch (column) {
        case "name":
          return this.votes.sort(sortByName);
        case "fulltime":
          return this.votes.sort(sortByFulltime);
        case "mentoring":
          return this.votes.sort(sortByMentoring);
        case "responsibility":
          return this.votes.sort(sortByResponsibility);
        case "codestyle":
          return this.votes.sort(sortByCodestyle);
        case "results":
          return this.votes.sort(sortByResults);
        default:
          return this.votes;
      }
    },

    prevPage() {
        this.pageNumber--;
    },

    nextPage() {
        this.pageNumber++;
    },
  },
};

var sortByName = function (d1, d2) {
  return d1.name.toLowerCase() < d2.name.toLowerCase() ? 1 : -1;
};
var sortByFulltime = function (d1, d2) {
  return d1.fulltime < d2.fulltime ? 1 : -1;
};
var sortByMentoring = function (d1, d2) {
  return d1.mentoring < d2.mentoring ? 1 : -1;
};
var sortByResponsibility = function (d1, d2) {
  return d1.responsibility < d2.responsibility ? 1 : -1;
};
var sortByCodestyle = function (d1, d2) {
  return d1.codestyle < d2.codestyle ? 1 : -1;
};
var sortByResults = function (d1, d2) {
  return d1.result < d2.result ? 1 : -1;
};
</script>

<style scoped>

a {
  font-weight: normal;
  color: blue;
}

a.active {
  font-weight: bold;
  color: black;
}

</style>
