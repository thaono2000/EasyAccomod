<aside class="main-sidebar image-sidebar elevation-4">
    <a href="{{ route('admin.admins_home') }}" class="brand-link">
        <img src="{{ asset('images/logo.png') }}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3">

        <span class="brand-text font-weight-light" style="color: white">AccomodCorp</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.admins_home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home" style="color: white"></i>
                        <p style="color: white">Trang chủ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <button href="" class="nav-link dropdown-btn">
                        <i class="nav-icon fas fa-users" style="color: white"></i>
                        <p style="color: white">Quản lý tài khoản</p>
                    </button>
                    <div class="dropdown-container">
                        <a href="{{ route('admin.accounts.success_list_account') }}" class="nav-link" style="color: white">
                            <i class="nav-icon fas fa-check-circle" style="color: white"></i>
                            Tài khoản đã phê duyệt
                        </a>
                        <a href="{{ route('admin.accounts.wait_list_account') }}" class="nav-link" style="color: white">
                            <i class="nav-icon fas fa-spinner fa-pulse" style="color: white"></i>
                            Tài khoản chưa phê duyệt
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <button href="" class="nav-link dropdown-btn">
                        <i class="nav-icon fas fa-list" style="color: white"></i>
                        <p style="color: white">Danh sách bài đăng</p>
                    </button>
                    <div class="dropdown-container">
                        <a href="{{ route('admin.posts.list_success_post') }}" class="nav-link" style="color: white">
                            <i class="nav-icon fas fa-check-circle" style="color: white"></i>
                            Bài đăng đã phê duyệt
                        </a>
                        <a href="{{ route('admin.posts.list_wait_post') }}" class="nav-link" style="color: white">
                            <i class="nav-icon fas fa-spinner fa-pulse" style="color: white"></i>
                            Bài đăng chờ phê duyệt
                        </a>
                        <a href="{{ route('admin.posts.list_refuse_post') }}" class="nav-link" style="color: white">
                            <i class="nav-icon fas fa-recycle" style="color: white"></i>
                            Bài đăng đã từ chối
                        </a>
                        <a href="{{ route('admin.list_extend')}}" class="nav-link" style="color: white">
                            <i class="nav-icon fas fa-spinner fa-pulse" style="color: white"></i>
                            Phê duyệt gia hạn
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            } else {
            dropdownContent.style.display = "block";
            }
        });
    }
</script>