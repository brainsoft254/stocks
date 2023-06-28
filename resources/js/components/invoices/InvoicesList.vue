<template>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-primary text-center">
                <strong>Invoices List</strong>

              </h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <a
                href="{{route('invoices.create')}}"
                id="btnNew"
                class="btn btn-primary"
                ><i class="fa fa-magic" disabled></i> New Invoice</a
              >
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="between-flex my-3">
                <div class="center-flex-items">
                  <span class="mr-1 pe-2">Show</span>
                  <select
                    v-model="currentEntries"
                    class="select form-control"

                    @change="$emit('change', value)"
                  >
                    <option v-for="se in showEntries" :key="se" :value="se">
                      {{ se }}
                    </option>
                  </select>
                  <span class="ml-1 ps-2">Entries</span>
                </div>
              <div class="end:flex">
                <input
                  type="search"
                  v-model="searchText"
                  @keyup="searchEvent"
                  class="form-control input:width-25"
                  placeholder="Search Here.."
                />
              </div>

              </div>
            </div>
          </div>
        </div>
        <div class="box-body">
          <MyDataTable :columns="columns" :entries="filteredEntries" />
          <div class="between-flex margin-3">
            <div class="text-black text-bold">
              Showing {{ showInfo.from }} to {{ showInfo.to }} of
              {{ showInfo.of }} entries
            </div>
            <div class="end:flex">
              <ul class="pagination">
                <li :class="['page-item', { disabled: currentPage === 1 }]">
                  <a
                    href="#"
                    class="page-link"
                    @click.prevent="(currentPage = 1), paginateEntries()"
                    >First</a
                  >
                </li>
                <li :class="['page-item', { disabled: currentPage === 1 }]">
                  <a
                    href="#"
                    class="page-link"
                    @click.prevent="
                      currentPage < 1 ? (currentPage = 1) : (currentPage -= 1),
                        paginateEntries()
                    "
                    >Prev</a
                  >
                </li>
                <li
                  v-for="pagi of showPagination"
                  :key="pagi"
                  :class="[
                    'page-item',
                    {
                      ellipsis: pagi === '...',
                      active: pagi === currentPage,
                    },
                  ]"
                >
                  <a
                    href="#"
                    class="page-link"
                    @click.prevent="paginateEvent(pagi)"
                    >{{ pagi }}</a
                  >
                </li>
                <li
                  :class="['page-item', { disabled: currentPage === allPages }]"
                >
                  <a
                    href="#"
                    class="page-link"
                    @click.prevent="
                      currentPage > allPages
                        ? (currentPage = allPages)
                        : (currentPage += 1),
                        paginateEntries()
                    "
                    >Next</a
                  >
                </li>
                <li
                  :class="['page-item', { disabled: currentPage === allPages }]"
                >
                  <a
                    href="#"
                    class="page-link"
                    @click.prevent="(currentPage = allPages), paginateEntries()"
                    >Last</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import MyDataTable from "./MyDataTable.vue";
import { $array } from "alga-js";
export default {
  name: "invoiceslist",
  components: {
    MyDataTable,
  },
  data() {
    return {
      columns: [
        { name: "id", text: "ID" },
        { name: "invno", text: "INVNO" },
        { name: "invdate", text: "TRANDATE" },
        { name: "clcode", text: "CLCODE" },
        { name: "clname", text: "CLNAME" },
        { name: "lpo", text: "LPO" },
        { name: "vat", text: "VAT" },
        { name: "amount", text: "TOTAL" },
        { name: "amount_paid", text: "PAID" },
        { name: "bal", text: "BAL" },
        { name: "status", text: "STATUS" },
        { name: "options", text: "ACTION" },
      ],
      entries: [],
      showEntries: [5, 10, 15, 25, 50, 80, 120],
      currentEntries: 10,
      filteredEntries: [],
      currentPage: 1,
      allPages: 1,
      searchText: "",
      searchEntries: [],
    };
  },
  computed: {
    showInfo() {
      const getCurrentEntries =
        this.searchEntries.length > 0 ? this.searchEntries : this.entries;

      return $array.show(
        getCurrentEntries,
        this.currentPage,
        this.currentEntries
      );
    },
    showPagination() {
      return $array.pagination(this.allPages, this.currentPage, 3);
    },
  },
  watch: {
    currentEntries() {
      this.paginateEntries();
    },
  },
  created() {
    this.getInvoices();
  },
  methods: {
    getInvoices() {
      console.log("fired invoices");
      axios
        .get("/api/get-invoices")
        .then((response) => {
          this.entries = response.data;
          this.paginateEntries();
          this.allPages = $array.pages(this.entries, this.currentEntries);
        })
        .catch((err) => {
          console.log(err.message);
        });
    },
    paginateEntries() {
      if (this.searchText.length >= 3) {
        this.searchEntries = $array.search(this.entries, this.searchText);
        this.allPages = $array.pages(this.searchEntries, this.currentEntries);
        this.filteredEntries = $array.paginate(
          this.searchEntries,
          this.currentPage,
          this.currentEntries
        );
      } else {
        this.searchEntries = [];
        this.filteredEntries = $array.paginate(
          this.entries,
          this.currentPage,
          this.currentEntries
        );

        this.allPages = $array.pages(this.entries, this.currentEntries);
      }

      console.log("paginateEntries", this.filteredEntries);
    },
    paginateEvent(page) {
      this.currentPage = page;
      this.paginateEntries();
    },
    searchEvent() {
      this.currentPage = 1;
      this.paginateEntries();
    },
  },
};
</script>
<style scoped>

thead,tbody{
  border-bottom:solid 2px #000
}
</style>
