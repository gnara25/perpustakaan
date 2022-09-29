
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="idCard.css">
    <title>ID Card</title>
<!-- So lets start -->
<style>
    *{
    margin: 00px;
    padding: 00px;
    box-sizing: content-box;
}

.container {
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #e6ebe0;
    flex-direction: row;
    flex-flow: wrap;

}

.font{
    height: 375px;
    width: 250px;
    position: relative;
    border-radius: 10px;
}

.top{
    height: 30%;
    width: 100%;
    background-color: #8338ec;
    position: relative;
    z-index: 5;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.bottom{
    height: 70%;
    width: 100%;
    background-color: white;
    position: absolute;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.top img{
    height: 100px;
    width: 100px;
    background-color: #e6ebe0;
    border-radius: 10px;
    position: absolute;
    top:60px;
    left: 75px;
}
.bottom p{
    position: relative;
    top: 60px;
    text-align: center;
    text-transform: capitalize;
    font-weight: bold;
    font-size: 20px;
    text-emphasis: spacing;
}
.bottom .desi{
    font-size:12px;
    color: grey;
    font-weight: normal;
}
.bottom .no{
    font-size: 15px;
    font-weight: normal;
}
.barcode img
{
    height: 65px;
    width: 65px;
    text-align: center;
    margin: 5px;
}
.barcode{
    text-align: center;
    position: relative;
    top: 70px;
}

.back
{
    height: 375px;
    width: 250px;
    border-radius: 10px;
    background-color: #8338ec;

}
.qr img{
    height: 80px;
    width: 100%;
    margin: 20px;
    background-color: white;
}
.Details {
    color: white;
    text-align: center;
    padding: 10px;
    font-size: 25px;
}


.details-info{
    color: white;
    text-align: left;
    padding: 5px;
    line-height: 20px;
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
    line-height: 22px;
}

.logo {
    height: 40px;
    width: 150px;
    padding: 40px;
}

.logo img{
    height: 100%;
    width: 100%;
    color: white ;

}
.padding{
    padding-right: 20px;
}

@media screen and (max-width:400px)
{
    .container{
        height: 130vh;
    }
    .container .front{
        margin-top: 50px;
    }
}
@media screen and (max-width:600px)
{
    .container{
        height: 130vh;
    }
    .container .front{
        margin-top: 50px;
    }

}
</style>
</head>
<body>
    @foreach ( $data as $data )
        
    <div class="container">
        <div class="padding">
            <div class="font">
                <div class="top">
                    <img src="images/download.png">
                </div>
                <div class="bottom">
                    <p>Zadafiya Brothers</p>
                    <p class="desi">UX/UI Designer</p>
                    <div class="barcode">
                        <img src="images/qr sample.png" 
                        alt="" >
                    </div>
                    <br>
                    <p class="no">+91 8980849796</p>
                    <p class="no">part-1,89 harinadad d...sdv..sdf..sfd..sd.</p>
                </div>
            </div>
        </div>
        <div class="back">
            <h1 class="Details">information</h1>
            <hr class="hr">
            <div class="details-info">
                <p><b>Email : </b></p>
                <p>Planicsdevloper@gmail.com</p>
                <p><b>Mobile No: </b></p>
                <p>8460304196</p>
                <p><b>Office Address:</b></p>
                <p>part-1,89 harinadad d...sdv..sdf..sfd..sd.road,india</p>
                </div>
                <div class="logo">
                    <img src="images/barcode.PNG">
                </div>

                
                <hr>
            </div>
        </div>
    </div>

    
    @endforeach
</body>
</html>