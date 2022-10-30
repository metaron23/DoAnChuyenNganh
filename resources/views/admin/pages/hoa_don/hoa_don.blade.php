@extends('admin.master')

@section('content')
@section('title')
    <h2>Quản Lý Hoá Đơn</h2>
@endsection

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Danh Sách Hoá Đơn</h5>
        </div>
        <div class="card-body">
            <div class="dt-ext table-responsive">
                <div id="export-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <table class="display dataTable" id="export-button" role="grid" aria-describedby="export-button_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1"
                                    aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 138.375px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1"
                                    aria-label="Position: activate to sort column ascending" style="width: 230.75px;">Position</th>
                                <th class="sorting" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1"
                                    aria-label="Office: activate to sort column ascending" style="width: 101.984px;">Office</th>
                                <th class="sorting" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1"
                                    aria-label="Age: activate to sort column ascending" style="width: 41.9375px;">Age</th>
                                <th class="sorting" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1"
                                    aria-label="Start date: activate to sort column ascending" style="width: 91.9062px;">Start date</th>
                                <th class="sorting" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1"
                                    aria-label="Salary: activate to sort column ascending" style="width: 77.0469px;">Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="odd">
                                <td class="sorting_1">Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>33</td>
                                <td>2008/11/28</td>
                                <td>$162,700</td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="sorting_1">Angelica Ramos</td>
                                <td>Chief Executive Officer (CEO)</td>
                                <td>London</td>
                                <td>47</td>
                                <td>2009/10/09</td>
                                <td>$1,200,000</td>
                            </tr>
                            <tr role="row" class="odd">
                                <td class="sorting_1">Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                                <td>2009/01/12</td>
                                <td>$86,000</td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="sorting_1">Bradley Greer</td>
                                <td>Software Engineer</td>
                                <td>London</td>
                                <td>41</td>
                                <td>2012/10/13</td>
                                <td>$132,000</td>
                            </tr>
                            <tr role="row" class="odd">
                                <td class="sorting_1">Brenden Wagner</td>
                                <td>Software Engineer</td>
                                <td>San Francisco</td>
                                <td>28</td>
                                <td>2011/06/07</td>
                                <td>$206,850</td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="sorting_1">Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>61</td>
                                <td>2012/12/02</td>
                                <td>$372,000</td>
                            </tr>
                            <tr role="row" class="odd">
                                <td class="sorting_1">Bruno Nash</td>
                                <td>Software Engineer</td>
                                <td>London</td>
                                <td>38</td>
                                <td>2011/05/03</td>
                                <td>$163,500</td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="sorting_1">Caesar Vance</td>
                                <td>Pre-Sales Support</td>
                                <td>New York</td>
                                <td>21</td>
                                <td>2011/12/12</td>
                                <td>$106,450</td>
                            </tr>
                            <tr role="row" class="odd">
                                <td class="sorting_1">Cara Stevens</td>
                                <td>Sales Assistant</td>
                                <td>New York</td>
                                <td>46</td>
                                <td>2011/12/06</td>
                                <td>$145,600</td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="sorting_1">Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                                <td>2012/03/29</td>
                                <td>$433,060</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Position</th>
                                <th rowspan="1" colspan="1">Office</th>
                                <th rowspan="1" colspan="1">Age</th>
                                <th rowspan="1" colspan="1">Start date</th>
                                <th rowspan="1" colspan="1">Salary</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/dataTables.buttons.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/jszip.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/buttons.colVis.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/pdfmake.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/vfs_fonts.js"></script>
<script src="../assets/js/datatable/datatable-extension/dataTables.autoFill.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/dataTables.select.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/buttons.html5.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/buttons.print.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/dataTables.responsive.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/dataTables.keyTable.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/dataTables.colReorder.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/dataTables.scroller.min.js"></script>
<script src="../assets/js/datatable/datatable-extension/custom.js"></script>
<script src="../assets/js/tooltip-init.js"></script>
@endsection
