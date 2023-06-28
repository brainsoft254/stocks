<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <DataTable
                 
                    :value="invoices"
                    :paginator="true"
                    :rows="10"
                    :rowHover="true"
                    dataKey="id"
                    :loading="loading"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[10, 25, 50]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} entries"
                    responsiveLayout="scroll"
                    tableStyleClass="prime-table"
                    headerClass="prime-headers"
                    
                >
                    <template #empty> No Invoices found. </template>
                    <template #loading>
                        Loading Invoices. Please wait...
                    </template>
                    <template #header class="bg-primary text-white">
                        <div class="table-header">
                            <h3 class="text-primary text-cexnter">
                                <strong>Invoices List</strong>
                            </h3>
                        </div>
                        <div class="p-d-flex p-jc-between">
                            <Button
                                type="button"
                                icon="pi pi-filter-slash"
                                label="Clear"
                                class="p-button-outlined"
                                @click="clearFilter()"
                            />
                            <span class="p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText
                                    v-model="searchText"
                                    placeholder="Keyword Search"
                                />
                            </span>
                        </div>
                    </template>

                    <Column header="#">
                        <template #body="slotProps">
                            <span>{{ slotProps.index + 1 }}</span>
                        </template>
                    </Column>
                    <Column
                        field="invno"
                        filterField="invno"
                        header="Invno"
                        :sortable="true"
                    />
                    <Column
                        field="invdate"
                        header="Trandate"
                        :sortable="true"
                    />
                    <Column
                        field="clcode"
                        filterField="clcode"
                        header="Clcode"
                        :sortable="true"
                    />
                    <Column
                        field="clname"
                        filterField="clname"
                        header="Clname"
                        :sortable="true"
                    >
                        <!-- <template #body="slotProps">
                            <span>{{
                                getClientName(slotProps.data.clcode)
                            }}</span>
                        </template> -->
                    </Column>

                    <Column
                        field="lpo"
                        filterField="lpo"
                        header="LPO"
                        :sortable="true"
                    />
                    <Column field="vat" header="Vat" :sortable="true" />
                    <Column field="amount" header="Total" :sortable="true" />
                    <Column field="amount_paid" header="Paid" />
                    <Column header="Bal">
                        <template #body="slotProps">
                            <span class="stocks-badge status-unposted " badgeClass="p-badge-danger">{{
                                number_format(
                                    slotProps.data.amount -
                                        slotProps.data.amount_paid
                                )
                            }}</span>
                        </template>
                    </Column>
                    <Column field="status" header="Status" :sortable="true">
                        <template #body="slotProps">
                            <span
                                :class="[
                                    slotProps.data.status
                                        ? 'stocks-badge status-posted '
                                        : 'stocks-badge status-unposted ',
                                    'pl-2',
                                ]"
                                >{{
                                    slotProps.data.status
                                        ? "Posted"
                                        : "Unposted"
                                }}</span
                            >
                        </template>
                    </Column>
                    <Column header="Options">
                        <template #body="slotProps">
                            <div class="btn-group">
                                <button
                                    type="button"
                                    class="
                                        btn btn-success
                                        dropdown-toggle
                                        btn-xs
                                    "
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    Action
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            id="viewLink"
                                            href="#"
                                            idd="{{invoice.id}}"
                                            @click="
                                                linkclick(slotProps.data.id)
                                            "
                                            clients
                                            ><i
                                                class="fa fa-print"
                                                aria-hidden="true"
                                            ></i>
                                            Print</a
                                        >
                                    </li>
                                    <li role="separator" class="divider"></li>

                                    <li>
                                        <a id="editLink" href="#"
                                            ><i
                                                class="fa fa-edit"
                                                aria-hidden="true"
                                            ></i>
                                            Edit</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </template>
                    </Column>
                </DataTable>
            </div>
        </div>
    </div>
</template>

<script>
import DataTable from "primevue/datatable";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import SelectButton from "primevue/selectbutton";
import Column from "primevue/column";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { ref, onMounted, reactive, toRefs, computed, onBeforeMount } from "vue";
export default {
    name: "invoicelist",
    components: {
        DataTable,
        Column,
        Button,
        SelectButton,
        InputText,
    },
    setup() {
        console.log("FIRED ONSETUP");
        const state = reactive({
            invoices: [],
            selectedOption: null,
            selectedInvoice: null,
            loading: false,
            searchText: '',
            clients: [],
            clientName: "",
        });
        const linkclick = (invid) => {
            alert(invid);
        };
        const number_format = (number) => {
            return new Intl.NumberFormat("en-EN", {
                style: "currency",
                currency: "KES",
            }).format(number);
        };


        // const getClientName =(clcode)=>computed(() => {
        //     let fltClient= state.clients.filter((client)=>{
        //         return client.code.indexOf(clcode)!=-1;
        //     });
        //     //console.log("fltcl",fltClient);
        //     return fltClient[0].name;
        // });
        const getClientName =(clcode)=>{
            let fltClient= state.clients.filter((client)=>{
                return client.code==clcode;
            });
            return fltClient[0].name.trim();
        };

        const getClients = () => {
            axios.get("http://stockcity.test/api/clients")
                .then((resp) => {
                    state.clients = resp.data;
                })
               .catch((err) => {
                    console.log("ERROR (getclients)", err.message);
                });
        };
        const getInvoices = () => {

            axios.get("http://stockcity.test/api/get-invoices")
                .then((response) => {
                  //state.invoices=response.data;
                        //console.log("INVOICES",response.data);
                    state.invoices=response.data.map((invoice)=>({...invoice,'clname':getClientName(invoice.clcode)}));
                            
   
                    //console.log("NEW INVOICES",idata);
                    
                    })
                .catch((err) => {
                    console.log(err.message);
                });
        };

        onBeforeMount(() => {
            console.log("FIRED B4onMount");
           getClients();
        });
        onMounted(() => {
            console.log("FIRED onMount");
             //getClients();
            getInvoices();
        });

        return {
            getClientName,
            number_format,
            linkclick,
            ...toRefs(state),
        };
    },
};
</script>
<style scoped>
.p-component {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 1.5rem;
}
.table-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.prime-table{
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 1rem;
    font-weight: normal;
}
.prime-headers{
    text-align: left;
padding: 1rem 1rem;
border: 1px solid #e9ecef;
border-width: 0 0 1px 0;
font-weight: 600;
color: #495057;
background: #f8f9fa;
transition: box-shadow 0.2s;
}
.p-datatable .p-datatable-header {
    background: #f4f4f4;
    color: #495057;
    border: 1px solid #e9ecef;
    border-width: 1px 0 1px 0;
    padding: 1rem 1rem;
    font-weight: 800 !important;
}
.layout-content .card {
    background: var(--surface-e);
    padding: 2rem;
    -webkit-box-shadow: 0 2px 1px -1px rgb(0 0 0 / 20%), 0 1px 1px 0 rgb(0 0 0 / 14%), 0 1px 3px 0 rgb(0 0 0 / 12%);
    box-shadow: 0 2px 1px -1px rgb(0 0 0 / 20%), 0 1px 1px 0 rgb(0 0 0 / 14%), 0 1px 3px 0 rgb(0 0 0 / 12%);
    border-radius: 4px;
    margin-bottom: 2rem;
}
.stocks-badge {
        border-radius: 2px;
        padding: .25em .5rem;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: .3px;
    }

    .stocks-badge.status-posted {
        background-color: #C8E6C9;
        color: #256029;
    }

    .stocks-badge.status-unposted {
        background-color: #FFCDD2;
        color: #C63737;
    }

    .stocks-badge.status-negotiation {
        background-color: #FEEDAF;
        color: #8A5340;
    }

    .stocks-badge.status-new {
        background-color: #B3E5FC;
        color: #23547B;
    }

    .stocks-badge.status-renewal {
        background-color: #ECCFFF;
        color: #694382;
    }

    .stocks-badge.status-proposal {
        background-color: #FFD8B2;
        color: #805B36;
    }

</style>
