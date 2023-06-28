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
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <table
                            class="table compact row-border hover"
                            style="width: 100%"
                            id="item-table"
                        >
                            <thead class="text-success bg-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Invno</th>
                                    <th>Trandate</th>
                                    <th>Clcode</th>
                                    <th>Clname</th>
                                    <th>LPO</th>
                                    <th>Vat</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Bal</th>
                                    <th>Status</th>
                                    <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(invoice, index) in invoices"
                                    :key="index"
                                >
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ invoice.invno }}</td>
                                    <td>{{ invoice.invdate }}</td>
                                    <td>{{ invoice.clcode }}</td>
                                    <td></td>
                                    <td>{{ invoice.lpo }}</td>
                                    <td>
                                        <span
                                            class="
                                                label
                                                label-warning
                                                label-as-badge
                                            "
                                            >{{
                                                invoice.vat.toLocaleString()
                                            }}</span
                                        >
                                    </td>
                                    <td class="text-right">
                                        <span
                                            class="
                                                label
                                                label-danger
                                                label-as-badge
                                            "
                                        >
                                            {{
                                                invoice.amount.toLocaleString()
                                            }}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="
                                                label
                                                label-success
                                                label-as-badge
                                            "
                                        >
                                            {{
                                                invoice.amount_paid.toLocaleString()
                                            }}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="
                                                label
                                                label-danger
                                                label-as-badge
                                            "
                                        >
                                            {{
                                                (
                                                    invoice.amount -
                                                    invoice.amount_paid
                                                ).toLocaleString()
                                            }}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            v-if="invoice.status"
                                            class="
                                                label
                                                label-success
                                                label-as-badge
                                            "
                                            >Posted</span
                                        >
                                        <span
                                            v-else
                                            class="
                                                label
                                                label-warning
                                                label-as-badge
                                            "
                                        >
                                            Unposted</span
                                        >
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button
                                                type="button"
                                                class="
                                                    btn btn-primary
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
                                                        ><i
                                                            class="fa fa-print"
                                                            aria-hidden="true"
                                                        ></i>
                                                        Print</a
                                                    >
                                                </li>
                                                <li>
                                                    <a id="editLink" href="#"
                                                        ><i
                                                            class="fa fa-edit"
                                                            aria-hidden="true"
                                                        ></i>
                                                        Edit</a
                                                    >
                                                </li>
                                                <li
                                                    role="separator"
                                                    class="divider"
                                                ></li>

                                                <li>
                                                    <a
                                                        id="postLink"
                                                        href="{{url('post-order')}}"
                                                        idd="{{invoice.id}}"
                                                        ><i
                                                            class="fa fa-magic"
                                                            aria-hidden="true"
                                                        ></i>
                                                        Post</a
                                                    >
                                                </li>
                                                <li
                                                    role="separator"
                                                    class="divider"
                                                ></li>

                                                <li>
                                                    <input
                                                        type="hidden"
                                                        value="<?php echo csrf_token(); ?>"
                                                        name="_token"
                                                    /><a
                                                        class="text-primary"
                                                        id="deleteLink"
                                                        href="{{route('orders.destroy',invoice.id)}}"
                                                        idd="{{invoice.id}}"
                                                        ><i
                                                            class="
                                                                fa fa-trash-o
                                                            "
                                                            aria-hidden="true"
                                                        ></i>
                                                        Delete</a
                                                    >
                                                </li>
                                                @endif @if(invoice.locked>0)
                                                <li
                                                    role="separator"
                                                    class="divider"
                                                ></li>
                                                <li>
                                                    <input
                                                        type="hidden"
                                                        value="<?php echo csrf_token(); ?>"
                                                        name="_token"
                                                    /><a
                                                        class="text-primary"
                                                        id="unlockLink"
                                                        href="{{route('invoices.destroy',invoice.id)}}"
                                                        idd="{{invoice.id}}"
                                                        ><i
                                                            class="fa fa-unlock"
                                                            aria-hidden="true"
                                                        ></i>
                                                        Unlock</a
                                                    >
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import "jquery/dist/jquery.min.js";
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
import { ref, onMounted, reactive, toRefs } from "vue";
export default {
    setup() {
        const state = reactive({ invoices: [] });

        const getInvoices = () => {
            console.log("FIRED GetINVOICES");
            fetch("http://stockcity.test/api/get-invoices")
                .then((response) => response.json())
                .then((data) => {
                    //console.log("DATA", data);
                    state.invoices = data;
                })
                .catch((err) => {
                    console.log(err.data);
                });
            console.log("DADADADAD", state.invoices);
        };

        onMounted(() => {
            console.log("FIRED onMount");
            getInvoices();
            $("#item-table").DataTable({ pageLength: 25 });
        });

        return {
            ...toRefs(state),
        };
    },
};
</script>
<style scoped>
https: //www.youtube.com/watch?v=OgutXmQDq-k&list=RDCMUCdhV8d9wLRI1WUB4pnV0Row&start_radio=1
;
</style>
