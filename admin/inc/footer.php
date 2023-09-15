</section>
<script>
       $(document).ready( function () {
            $('table').DataTable();
        } );

        const menuItems = document.querySelectorAll('.menu-item');

menuItems.forEach(item => {
    item.addEventListener('click', function() {
        // Remove the "active" class from all menu items
        menuItems.forEach(item => item.classList.remove('active'));

        // Add the "active" class to the clicked menu item
        this.classList.add('active');
    });
});
    </script>
</body>
</html>

