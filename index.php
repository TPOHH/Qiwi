<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Qiwi cost by TPOH</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script language="JavaScript">
        $(document).ready(function(){
            $("#submit").click(function()
            {
                $("#erconts").fadeIn(5000);
                $.ajax(
                    {
                        type: "POST",
                        url: "form.php", // Адрес обработчика
                        data: $("#callbacks").serialize(),
                        error:function()
                        {
                            $("#erconts").html(result);
                        },
                        beforeSend: function()
                        {
                            <!--- ТУТ Я ИЗМЕНИЛ КОД  -->
                            $("#erconts").html("<div class='spinner-border' role='status'> <span class='sr-only'>Loading...</span></div>");
                        },
                        success: function(result)
                        {
                            $("#erconts").html(result);
                            checkThis();
                        }
                    });
                return false;
            });
        });
    </script>




</head>
<body>




<div class="card text-center mx-auto" style="width: 30rem;">
    <div class="card-header text-center col-auto bg-warning" style="width: 35rem">
        Qiwi Считаем расходы
    </div>
    <div class="card-body">
        <form class="order_form" action = "" id="callbacks">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Номер телефона</label>
                    <input type = "text" class="form-control" name = "personId" required = ""  aria-describedby="phoneHelp" placeholder = "79876543210" >
                    <small id="phoneHelp" class="form-text text-muted">Номер телефона без "+"</small>
                </div>

                <div class="form-group col-md-6">
                    <label for="token">API Token</label>
                    <input type = "text" class="form-control" name = "token" required = "" aria-describedby="tokenHelp" placeholder = "le9465g32c528y57383w995kt390n34m" >
                    <small id="tokenHelp" class="form-text text-muted">Токен от qiwi кошелька</small>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="work_mod">Режим работы</label>
                    <select type="text" id="work_mod" class="form-control" name="work_mode" aria-describedby="work_modeHelp">
                        <option value="limit">Лимиты</option>
                        <option value="balance">Баланс</option>
                        <option value="cost">Расходы</option>
                    </select>
                    <small id="work_modeHelp" class="form-text text-muted">Что делать будем?</small>
                </div>

                <div class="form-group col-md-6">
                    <label for="typeCost">Расходы</label>
                    <select type="text" id="typeCost" class="form-control" name="type_cost" aria-describedby="type_costHelp">
                        <option value="ALL">Все</option>
                        <option value="QIWI_CARD">Только карты</option>
                        <option value="OUT">Кошелёк</option>
                    </select>
                    <small id="type_costHelp" class="form-text text-muted">Если в первом меню выбрали "Расходы", тут выбираем какие расходы считать</small>
                </div>
            </div>



            <div class="form-row">
                <label for="calendar">Кликните на поле ввода даты для вызова календаря:</label>
                <div class="form-group col-md-6">
                    с <input type="date" class="form-control" id="date" name="date" required = "">
                </div>
                <div class="form-group col-md-6">
                    по <input type="date" class="form-control" id="date" name="date2" required = "">
                </div>


            </div>

            <!-- Чекбокс
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="IMKlo_true">
                <label class="form-check-label" for="exampleCheck1">Добавить домены в IM Klo</label>
            </div> -->

            <!--- ТУТ Я ИЗМЕНИЛ КОД  -->
            <input type="submit" id="submit" value="Отправить" class="btn btn-primary btn-outline-success text-light">

        </form >

        <!--- ТУТ Я ИЗМЕНИЛ КОД  -->
        <br><div id="erconts" style = "display: none" class="alert bg-warning" role="alert"></div>
    </div>






    <footer>
        <div class="container">
            <p class="copyright"><a href="https://vk.com/tron_cpa" target="_blank">© ТРОН, 2020</a></p>
        </div>
    </footer>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>





</body>
</html>