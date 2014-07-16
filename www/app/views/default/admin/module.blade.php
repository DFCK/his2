<div class="row">
    <div class="col-xs-12">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw"></i>{{trans('admin.module-title')}}
        </h1>
    </div>

</div>
<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-0"
                 data-widget-editbutton="false">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

                -->
                <header>
                    <span class="widget-icon"> <i class="fa fa-floppy-o"></i> </span>

                    <h2>Thêm chức năng mới</h2>

                </header>
                <!-- widget div-->
                <div class="">

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <form class=" smart-form">
                            <fieldset>
                                <div class="row  ">
                                <section class="col col-3">
                                    <label class="label">Tên chức năng</label>
                                    <label class="input">
                                        <input type="text" placeholder="Tên chức năng">
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="label">Đường dẫn</label>
                                    <label class="input">
                                        <input type="text" placeholder="Đường dẫn">
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="label">Biến ngôn ngữ</label>
                                    <label class="input">
                                        <input type="text" placeholder="Biến ngôn ngữ">
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="label">Thuộc Nhóm</label>
                                    <label class="select">
                                        <select>
                                            <option value="">Root</option>
                                        </select>
                                    </label>
                                </section>
                                </div>
                            </fieldset>
                            <footer>
                                <button class="btn btn-primary">{{trans('common.save')}}</button>
                            </footer>
                        </form>
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->


            </div>
            <!-- end widget -->
        </article>
        <!-- end article -->
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-blue" id="wid-id-1"
                 data-widget-editbutton="false">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

                -->
                <header>
                    <span class="widget-icon"> <i class="fa fa-th-list"></i> </span>

                    <h2>Danh sách các chức năng đang có</h2>

                </header>
                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        <div class="table-responsive">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Column name</th>
                                    <th>Column name</th>
                                    <th>Column name</th>
                                    <th>Column name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Row 1</td>
                                    <td>Row 2</td>
                                    <td>Row 3</td>
                                    <td>Row 4</td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->
        </article>
        <!-- end article -->
    </div>
    <!-- end row -->
</section>
<!-- end section -->