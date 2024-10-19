<button id="adminSidebarToggle">
    <div class="hamburger">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
    </div>
</button>
<div class="main_page">
    <div class="admin_panel_outerbox" id="main_page">
        <div class="user_login_deshboard dropdown">
            <div class="user_login_box">
                <div class="user_image">
                    <img src="{{ url('assets/backend/images/resource/user_login_img.png') }}" alt="">
                </div>
                <div class="user_info">
                    <h6>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
                    <div class="user_rating"><i class="fa-solid fa-star"></i>4.9</div>
                </div>
            </div>
            <div class="admin_panel_deshboard_menu">
                <ul>
                    <li><a href="#"><i class="flaticon-account"></i> Account</a></li>
                    <li><a href="#"><i class="flaticon-document-1"></i> Documents</a></li>
                    <li><a href="#"><i class="flaticon-cash"></i> Payment</a></li>
                    <li><a href="#"><i class="flaticon-car"></i> Vehicle Details</a></li>
                    <li><a href="#"><i class="flaticon-paper"></i> Tax Info</a></li>
                </ul>
            </div>
        </div>
        <div class="admin_company_info">
            <div class="language-switcher select-box">
                <select class="wide" id="language-select">
                    <option value="en">English</option>
                    <option value="es">Español</option>
                    <option value="fr">Français</option>
                    <option value="de">Deutsch</option>
                    <option value="zh">中文</option>
                </select>
            </div>
            <div class="admin_panel_notification_box">
                <button id="notifyButton"><img src="{{ url('assets/backend/images/icons/icon_8.png') }}" alt=""></button>
                <div id="notificationBox" class="notification">
                    <div class="header">
                        <span>Notifications</span>
                        <span class="mark-read">Make as Read</span>
                    </div>
                    <div class="notifications-list">
                        <div class="notification-item">
                            <img src="https://via.placeholder.com/50" alt="Avatar">
                            <div class="notification-content">
                                <p><strong>Malanie Hanvey</strong> We should talk about that at lunch!</p>
                                <small>2 minutes ago</small>
                            </div>
                            <span class="close">&times;</span>
                        </div>
                        <div class="notification-item">
                            <img src="https://via.placeholder.com/50" alt="Avatar">
                            <div class="notification-content">
                                <p><strong>Valentine Maton</strong> You can download the latest invoices...</p>
                                <small>36 minutes ago</small>
                            </div>
                            <span class="close">&times;</span>
                        </div>
                        <div class="notification-item">
                            <img src="https://via.placeholder.com/50" alt="Avatar">
                            <div class="notification-content">
                                <p><strong>Archie Cantones</strong> Don't forget to pick up Jeremy after school!</p>
                                <small>53 minutes ago</small>
                            </div>
                            <span class="close">&times;</span>
                        </div>
                    </div>
                    <div class="footer">
                        <span>All Notifications</span>
                    </div>
                </div>
            </div>
            <div class="admin_panel_login_btn">

                <a href="{{ route('logout') }}">
                    <div class="admin_panel_login_btn">
                        <img src="{{ url('assets/backend/images/icons/icon_9.png') }}" alt="">
                    </div>
                </a>
                <!-- <a href="#"><img src="{{ url('assets/backend/images/icons/icon_9.png') }}" alt=""></a> -->
            </div>
        </div>
    </div>
</div>