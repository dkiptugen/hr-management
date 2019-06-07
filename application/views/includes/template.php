<?php $this->load->view('includes/header');?>

<div class="wrapper">

    <?php $this->load->view('includes/navigation');?>

    <div class="main">
        <?php $this->load->view('includes/top_header');?>

        <?php $this->load->view($main_body);?>

        <?php $this->load->view('includes/static_footer');?>

    </div>

</div>

<?php $this->load->view('includes/footer');?>