<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body style="background-color:#F8ECBE; color:#333333; font-family:sans-serif; padding:40px 0px;">
        <table style="margin:0 auto; width:700px;" width="700px">
            <tr>
                <td align="center">
                    <a href="{{ url('') }}">
                        <img src="{{ url('/images/logo.png') }}" alt="BeeringHoney"/>
                    </a>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <h2>Welcome!</h2>
                </td>
            </tr>
            <tr>
                <td style="text-align:justify;">
                    <p>Dear {{ $data['profile']->name }},</p>
                    <p>&nbsp;</p>
                    <p>Thank you for register, your username is: {{ $data['profile']->email }}</p>
                    <p>Now you go to see <a href="{{ url('') }}">Beering Statistics</a></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Thank you for register!</p>
                    <p>&nbsp;</p>
                    <p><strong>BeeRing© {{ date('Y') }}</strong></p>
                </td>
            </tr>
        </table>
    </body>
</html>
