<nav class="sidebar sidebar-offcanvas" id="sidebar"
     style="background-color: #212529; 
            box-shadow: 2px 0 10px rgba(0,0,0,0.1); 
            height: calc(100vh - 70px); 
            position: fixed; 
            top: 60px; 
            left: 0; 
            overflow-y: auto; 
            width: 260px; 
            z-index: 100;">

     <ul class="nav flex-column" style="padding: 0 10px;">
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.dashboard') }}" 
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="icon-grid menu-icon me-3" style="font-size: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Dashboard</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.gallery.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-image menu-icon me-3" style="font-size: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Galeri</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.about.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-info-circle menu-icon me-3" style="font-size: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Tentang kami</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.berita.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-newspaper menu-icon me-3" style="font-size: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Berita Harian</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.layanan.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-cogs menu-icon me-3" style="font-size: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Layanan</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.faq.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-question-circle menu-icon me-3" style="font-size: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">FAQ</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.ulasan.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-comments menu-icon me-3" style="font-size: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Komentar</span>
            </a>
        </li>
    </ul>
    
  
</nav>

<script>
// Script untuk active state dan hover effects pada sidebar
document.addEventListener('DOMContentLoaded', function() {
    // Mendapatkan URL saat ini
    const currentLocation = window.location.href;
    
    // Mengatur active state pada nav links
    document.querySelectorAll('.nav-link').forEach(link => {
        const href = link.getAttribute('href');
        if (currentLocation.includes(href)) {
            link.style.backgroundColor = '#2c3136';
            link.style.borderLeft = '3px solid #fff';
        }
        
        // Hover effects
        link.addEventListener('mouseenter', function() {
            if (!currentLocation.includes(this.getAttribute('href'))) {
                this.style.backgroundColor = '#2c3136';
                this.style.borderLeft = '3px solid #6c757d';
            }
        });
        
        link.addEventListener('mouseleave', function() {
            if (!currentLocation.includes(this.getAttribute('href'))) {
                this.style.backgroundColor = 'transparent';
                this.style.borderLeft = '3px solid transparent';
            }
        });
    });
});
</script>