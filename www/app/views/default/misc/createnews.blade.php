<div data-ng-controller="MiscNewsController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-rss-square"></i> {{trans('misc.news')}}
            </h1>
        </div>
    </div>
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row" id="formperson">
    <article class="col col-xs-12 col-sm-7 ">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-miscnews0"
             data-widget-editbutton="false"
            >
            <header>
                <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>

                <h2>Soạn tin</h2>
            </header>
            <!-- widget div-->
            <div class="">
                <!-- widget content -->
                <div class="widget-body no-padding">
                    <form class=" smart-form" id="formnews">
                        <fieldset>
                            <div class="row  ">
                                <section class="col col-xs-12">
                                    <label class="label">Phạm vi</label>
                                    <label class="select">
                                        <select ng-model="news.place">
                                            <option value="99" ng-if="dept==99">Toàn bệnh viện</option>
                                            <option  data-ng-repeat="item in placelist" value="@{{item.code}}">
                                                @{{item.name}}
                                            </option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-xs-12">
                                    <label class="label">Tiêu đề</label>
                                    <label class="input">
                                        <input type="hidden" ng-model="news.id">
                                        <input ng-model="news.title">
                                    </label>
                                </section>
                                <section class="col col-xs-12">
                                    <label class="label">Tóm tắt</label>
                                   <label class="textarea">
                                       <textarea ng-model="news.shortinfo"></textarea>
                                   </label>
                                </section>
                                <section class="col col-xs-12 summernoteouter" >
                                    <label class="label">Nội dung</label>
                                    <div class="summernote">
                                </section>

                        </fieldset>
                        <footer>
                            <button class="btn btn-success" data-ng-click="save()">Lưu</button>
                            <button class="btn btn-primary pull-left" data-ng-click="clear()">Tin mới</button>
                        </footer>
                    </form>
                </div>
            </div>
        </div>
    </article>
    <article class="col col-xs-12 col-sm-5 ">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-miscnews1"
             data-widget-editbutton="false"
             data-widget-fullscreenbutton="false"
            >
            <header>
                <span class="widget-icon"> <i class="fa fa-list"></i> </span>

                <h2>Các tin đã đăng</h2>
            </header>
            <!-- widget div-->
            <div class="">
                <!-- widget content -->
                <div class="widget-body">
                    <ul class="list-unstyled">
                        <li data-ng-repeat="item in newslist.data" class="">
                            <a href="#" data-ng-click="edit(item.id)">
                                <i class="fa fa-caret-right"></i>&nbsp;
                                @{{item.title}}</a>&nbsp;
                                <em>(@{{item.created_at}})</em>
                        </li>
                    </ul>
                    <ul class="list-inline"  ng-if="newslist.last_page > 1">
                        <li data-ng-repeat="item in [] | paginate:newslist.last_page"><a class="bordered padding-5" href="#" data-ng-click="load(item,news.place)">@{{item}}</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </article>
     </div>
        </section>
</div>
<script>
    pageSetUp();
    function MiscNewsController($scope, $http) {
        $scope.dept = {{$dept}};
        $scope.placelist = {{$deptlist}};
        if($scope.dept && $scope.placelist){
            angular.forEach($scope.placelist,function(val,key){
                if($scope.dept != 99 && $scope.dept.indexOf(val.code) == -1)
                {
                    $scope.placelist.splice(key,1);
                }

            });
        }
        $scope.news={
            place:(($scope.dept==99)?$scope.dept:$scope.dept[0]),
            title:"",
            shortinfo:"",
            content:"",
            id:""
        };
        $scope.clear = function(){
            $scope.news={
            place:(($scope.dept==99)?$scope.dept:$scope.dept[0]),
                title:"",
                shortinfo:"",
                content:"",
                id:""
            };
            $(".summernote").code("");
        };
        $scope.save = function(){
            if($scope.news.title.trim() == ""){
                myalert("Lỗi nhập liệu","Bạn chưa nhập tiêu đề bản tin");
                return false;
            }
            $scope.news.content = $(".summernote").code();
            if($scope.news.content.trim() == ""){
                myalert("Lỗi nhập liệu","Bạn chưa nhập nội dung bản tin");
                return false;
            }
            $http.post('misc/savenews',{
                data:$scope.news
            }).success(function(msg){
                    if(msg > 0){
                        $scope.load(1,$scope.news.place);
                        $scope.clear();
                        myalert("Thông báo","Lưu thành công");
                    }
                    else{
                        myalert("Lỗi lưu","Có lỗi khi lưu");
                    }
                }).error(function(data, status, headers, config) {
                    myalert("Lỗi không xác định","Thao tác thất bại")
            });
        };
        $scope.load = function(page,place){
            $http.get('misc/loadlistnews/'+page+"/"+place)
                .success(function(msg){
                    $scope.newslist = msg;
                });
        };
        $scope.edit = function(id){
            $http.get('misc/load1news/'+id)
                .success(function(msg){
                    angular.copy(msg,$scope.news);
                    $(".summernote").code($scope.news.content);
                })
        }
        $scope.load(1,$scope.news.place);
    }
    var pagefunction = function() {
        // summernote
        $('.summernote').summernote({
            height : 180,
            focus : false,
            tabsize : 2
        });
    };

    // end pagefunction

    // load summernote, and all markdown related plugins
    loadScript("src/smartadmin/js/plugin/summernote/summernote.min.js", pagefunction);
</script>