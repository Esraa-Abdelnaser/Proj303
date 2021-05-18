<html>
    <head></head>
    <body>
        <form action="/login" method="POST">
            {{csrf_field()}}
            <div class="dd">
                <input  class="ii" type="number" name="num" min="1" max="50" value="0">    
                </div>
                <br><br>    
                <button class="btn btn-primary" type="submit">
                    
                    Order Me
                </button>
        </form>
    </body>
</html>