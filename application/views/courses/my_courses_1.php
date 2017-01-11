<script type="text/javascript">
$(document).ready(function() {
    $('#course_table').DataTable( {
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    });
});
</script>
<main class="site-main">
    <div id="wrapper">
        <?php $this->view('site/sidebar'); ?>
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="page_title">
                    <h1>Courses</h1>
                </div>
                <hr>
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="course_table" data-height="400px" role="grid" aria-describedby="sample_1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 10px;">
                                  S.No.
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Username : activate to sort column descending" style="width: 132px;"> Course </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Email : activate to sort column ascending" style="width: 197px;"> Description </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Status : activate to sort column ascending" style="width: 80px;"> Status </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Joined : activate to sort column ascending" style="width: 105px;"> Creation Date </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Actions : activate to sort column ascending" style="width: 108px;"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="gradeX odd" role="row">
                                <td>
                                    1.
                                </td>
                                <td class="sorting_1"> Thermodynamics -II </td>
                                <td>
                                    ThermoDynamics-II Detail Short
                                </td>
                                <td>
                                    <span class="label label-sm label-info"> active </span>
                                </td>
                                <td class="center"> 06-Jan-2017 </td>
                                <td>
                                  <div class="action_btns">
                                    <a href="#" class="btn btn-outline btn-primary btn-sm"><i class="fa fa-link"></i> View </a>
                                    <a href="#" id=""  class="btn btn-outline btn-danger btn-sm"><i class="fa fa-edit"></i> Edit </a>
                                 <!-- <a href="javascript:;" class="btn btn-outline btn-circle btn-sm red deletebtn"><i class="fa fa-edit"></i> Delete </a> -->
                                 </div>
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</main>
