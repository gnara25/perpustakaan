
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
    @foreach ( $dataanggota as $row )
        
    <div class="container">
        <div class="padding">
            <div class="font">
                <div class="top">
                    <img src="fotobuku/{{$row->foto}}">
                </div>
                <div class="bottom">
                    <p>{{ $row->nama }}</p>
                    <p class="desi">{{ $row->jenis_kelamin }}</p>
                    <div class="barcode">
                    {!! QrCode::size(65)->generate($row->nisn) !!}
                    </div>
                    <br>
                    @if ($no++ % 3 == 0)
                    </div><div>
                   @endif
                </div>
            </div>
        </div>
        <div class="back">
            <h1 class="Details">information</h1>
            <hr class="hr">
            <div class="details-info">
                <p><b>Kelas : </b></p>
                <p>{{ $row->kelas }}</p>
                <p><b>Alamat: </b></p>
                <p>{{ $row->alamat }}</p>
                <p><b>Tanggal Lahir:</b></p>
                <p>{{ Carbon\Carbon::parse($row->tgl_lahir)->format('d-m-Y') }}</p>
                </div>
                <div class="logo">
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($row->nisn, 'C39') }}" alt="{{ $row->nisn }}">
                </div>

                
                <hr>
                 @if ($no++ % 3 == 0)
                 </div><div>
                @endif
            </div>
        </div>
    </div>

    @endforeach

</body>
</html>