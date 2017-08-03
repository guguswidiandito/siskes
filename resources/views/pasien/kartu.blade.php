<html>
  <head>
    <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
    <meta name=Generator content="Microsoft Word 15 (filtered)">
    <style>
    /* Font Definitions */
    @font-face
    {font-family:"Cambria Math";
    panose-1:2 4 5 3 5 4 6 3 2 4;}
    @font-face
    {font-family:Calibri;
    panose-1:2 15 5 2 2 2 4 3 2 4;}
    @font-face
    {font-family:"Yu Mincho";
    panose-1:2 2 4 0 0 0 0 0 0 0;}
    @font-face
    {font-family:"\@Yu Mincho";}
    /* Style Definitions */
    p.MsoNormal, li.MsoNormal, div.MsoNormal
    {margin-top:0cm;
    margin-right:0cm;
    margin-bottom:8.0pt;
    margin-left:0cm;
    line-height:106%;
    font-size:11.0pt;
    font-family:"Calibri",sans-serif;}
    p.msonormal0, li.msonormal0, div.msonormal0
    {mso-style-name:msonormal;
    margin-right:0cm;
    margin-left:0cm;
    font-size:12.0pt;
    font-family:"Times New Roman",serif;}
    p.msochpdefault, li.msochpdefault, div.msochpdefault
    {mso-style-name:msochpdefault;
    margin-right:0cm;
    margin-left:0cm;
    font-size:12.0pt;
    font-family:"Calibri",sans-serif;}
    p.msopapdefault, li.msopapdefault, div.msopapdefault
    {mso-style-name:msopapdefault;
    margin-right:0cm;
    margin-bottom:8.0pt;
    margin-left:0cm;
    line-height:106%;
    font-size:12.0pt;
    font-family:"Times New Roman",serif;}
    .MsoChpDefault
    {font-size:10.0pt;}
    .MsoPapDefault
    {margin-bottom:8.0pt;
    line-height:106%;}
    @page WordSection1
    {size:595.3pt 841.9pt;
    margin:72.0pt 72.0pt 72.0pt 72.0pt;}
    div.WordSection1
    {page:WordSection1;}
    </style>
  </head>
  <body lang=EN-GB>
    <div class=WordSection1>
      <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
        style='border-collapse:collapse;border:none'>
        @foreach ($pasiens as $p)
        <tr>
          <td width=368 valign=top style='width:276.05pt;border:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <table class=MsoTable15Plain3 border=0 cellspacing=0 cellpadding=0
              style='border-collapse:collapse'>
              <tr style='height:16.1pt'>
                <td width=151 valign=top style='width:113.6pt;border:none;border-bottom:
                  solid #7F7F7F 1.0pt;background:white;padding:0cm 5.4pt 0cm 5.4pt;
                  height:16.1pt'>
                  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
                    line-height:normal'><b><span lang=IN style='text-transform:uppercase'>No.
                    Pasien</span></b></p>
                  </td>
                  <td width=202 valign=top style='width:151.65pt;border:none;border-bottom:
                    solid #7F7F7F 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.1pt'>
                    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
                      line-height:normal'><b><span lang=IN style='text-transform:uppercase'>{{ $p->no_pasien }}</span></b></p>
                    </td>
                  </tr>
                  <tr style='height:15.3pt'>
                    <td width=151 valign=top style='width:113.6pt;border:none;border-right:
                      solid #7F7F7F 1.0pt;background:#F2F2F2;padding:0cm 5.4pt 0cm 5.4pt;
                      height:15.3pt'>
                      <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
                        line-height:normal'><b><span lang=IN style='text-transform:uppercase'>Nama</span></b></p>
                      </td>
                      <td width=202 valign=top style='width:151.65pt;background:#F2F2F2;
                        padding:0cm 5.4pt 0cm 5.4pt;height:15.3pt'>
                        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
                          line-height:normal'><span lang=IN>{{ $p->nama_pasien }}</span></p>
                        </td>
                      </tr>
                      <tr style='height:16.1pt'>
                        <td width=151 valign=top style='width:113.6pt;border:none;border-right:
                          solid #7F7F7F 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.1pt'>
                          <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
                            line-height:normal'><b><span lang=IN style='text-transform:uppercase'>Tanggal
                            Lahir</span></b></p>
                          </td>
                          <td width=202 valign=top style='width:151.65pt;padding:0cm 5.4pt 0cm 5.4pt;
                            height:16.1pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
                              line-height:normal'><span lang=IN>{{ $p->tanggal_lahir }}</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.1pt'>
                            <td width=151 valign=top style='width:113.6pt;border:none;border-right:
                              solid #7F7F7F 1.0pt;background:#F2F2F2;padding:0cm 5.4pt 0cm 5.4pt;
                              height:16.1pt'>
                              <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
                                line-height:normal'><b><span lang=IN style='text-transform:uppercase'>Alamat</span></b></p>
                              </td>
                              <td width=202 valign=top style='width:151.65pt;background:#F2F2F2;
                                padding:0cm 5.4pt 0cm 5.4pt;height:16.1pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
                                  line-height:normal'><span lang=IN>{{ substr($p->alamat_pasien, 0, 19) }}</span></p>
                                </td>
                              </tr>
                              <tr style='height:91.95pt'>
                                <td width=151 valign=top style='width:113.6pt;border:none;border-right:
                                  solid #7F7F7F 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:91.95pt'>
                                  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
                                    line-height:normal'><b><span style='text-transform:uppercase'>&nbsp;</span></b></p>
                                  </td>
                                  <td width=202 valign=top style='width:151.65pt;padding:0cm 5.4pt 0cm 5.4pt;
                                    height:91.95pt'>
                                    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
                                    line-height:normal'>&nbsp;</p>
                                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:
                                      .0001pt;text-align:center;line-height:normal'><span lang=IN>&nbsp;</span></p>
                                      <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:
                                        .0001pt;text-align:center;line-height:normal'><span lang=IN>Kepala
                                        Puskesmas</span></p>
                                        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:
                                          .0001pt;text-align:center;line-height:normal'><span lang=IN>&nbsp;</span></p>
                                          <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:
                                            .0001pt;text-align:center;line-height:normal'><span lang=IN>&nbsp;</span></p>
                                            <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:
                                              .0001pt;text-align:center;line-height:normal'><span lang=IN>Gugus
                                              Widiandito, S.Kom</span></p>
                                            </td>
                                          </tr>
                                        </table>
                                        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
                                        normal'></p>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </table>
                                  <p class=MsoNormal>&nbsp;</p>
                                </div>
                              </body>
                            </html>