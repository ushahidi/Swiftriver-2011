<html>
  <head>
    <title>Oakland Crimespotting</title>
    <?php echo(Html::script("media/js/protovis/protovis-r3.2.js")); ?>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAYZ9eMYFYusxZt-1RKXLI7RQGpXqX26B62_lhdlIUxPTUm0CSORRw1BkwdprB1xQ3Xa8KfbgKAacxlw" type="text/javascript"></script>
    <style type="text/css">
        body {
          margin: 0;
        }

        #map {
          height: 100%;
        }

        #map .canvas {
          position: absolute;
        }
    </style>
    <script type="text/javascript+protovis">

    var crimes = [
      { id: "09-900792", code: "Th", date: "2009-03-20T00:00:00-07:00", lat: 37.845066, lon: -122.259251 },
      { id: "09-020138", code: "SA", date: "2009-03-20T00:00:00-07:00", lat: 37.801396, lon: -122.279043 },
      { id: "09-900795", code: "Th", date: "2009-03-20T00:00:00-07:00", lat: 37.776394, lon: -122.160752 },
      { id: "09-020618", code: "Bu", date: "2009-03-20T00:00:00-07:00", lat: 37.739572, lon: -122.153254 },
      { id: "09-020141", code: "Va", date: "2009-03-19T23:30:00-07:00", lat: 37.810612, lon: -122.283648 },
      { id: "09-020124", code: "SA", date: "2009-03-19T23:09:00-07:00", lat: 37.804087, lon: -122.271248 },
      { id: "09-020170", code: "Ro", date: "2009-03-19T23:00:00-07:00", lat: 37.771985, lon: -122.148367 },
      { id: "09-020118", code: "SA", date: "2009-03-19T22:30:00-07:00", lat: 37.82387, lon: -122.257414 },
      { id: "09-900806", code: "Th", date: "2009-03-19T22:30:00-07:00", lat: 37.812051, lon: -122.207804 },
      { id: "09-020088", code: "SA", date: "2009-03-19T22:20:00-07:00", lat: 37.806634, lon: -122.287244 },
      { id: "09-020126", code: "VT", date: "2009-03-19T22:15:00-07:00", lat: 37.728821, lon: -122.17316 },
      { id: "09-020435", code: "SA", date: "2009-03-19T21:45:00-07:00", lat: 37.757602, lon: -122.186953 },
      { id: "09-020112", code: "SA", date: "2009-03-19T21:41:00-07:00", lat: 37.78495, lon: -122.223304 },
      { id: "09-020103", code: "Ro", date: "2009-03-19T21:40:00-07:00", lat: 37.806111, lon: -122.25943 },
      { id: "09-020116", code: "AA", date: "2009-03-19T21:30:00-07:00", lat: 37.806263, lon: -122.27445 },
      { id: "09-020110-005", code: "AA", date: "2009-03-19T21:30:00-07:00", lat: 37.803965, lon: -122.263631 },
      { id: "09-020110-005", code: "Ro", date: "2009-03-19T21:30:00-07:00", lat: 37.803965, lon: -122.263631 },
      { id: "09-020111", code: "Ro", date: "2009-03-19T21:23:00-07:00", lat: 37.805855, lon: -122.239903 },
      { id: "09-900807", code: "Th", date: "2009-03-19T21:15:00-07:00", lat: 37.811995, lon: -122.205404 },
      { id: "09-020228", code: "Th", date: "2009-03-19T21:00:00-07:00", lat: 37.814464, lon: -122.264771 },
      { id: "09-900798", code: "Th", date: "2009-03-19T21:00:00-07:00", lat: 37.807515, lon: -122.194519 },
      { id: "09-900803", code: "Th", date: "2009-03-19T21:00:00-07:00", lat: 37.801198, lon: -122.21127 },
      { id: "09-020114", code: "VT", date: "2009-03-19T20:00:00-07:00", lat: 37.748443, lon: -122.175958 },
      { id: "09-020083", code: "SA", date: "2009-03-19T19:55:00-07:00", lat: 37.730081, lon: -122.180221 },
      { id: "09-020086", code: "Th", date: "2009-03-19T19:41:00-07:00", lat: 37.83699, lon: -122.262284 },
      { id: "09-020089", code: "Ro", date: "2009-03-19T19:40:00-07:00", lat: 37.847448, lon: -122.247897 },
      { id: "09-020186", code: "Bu", date: "2009-03-19T19:30:00-07:00", lat: 37.835648, lon: -122.255492 },
      { id: "09-020247", code: "VT", date: "2009-03-19T19:30:00-07:00", lat: 37.825067, lon: -122.247883 },
      { id: "09-020070", code: "Ro", date: "2009-03-19T19:20:00-07:00", lat: 37.807276, lon: -122.295423 },
      { id: "09-020071", code: "Th", date: "2009-03-19T19:10:00-07:00", lat: 37.828231, lon: -122.287191 },
      { id: "09-020275", code: "VT", date: "2009-03-19T18:45:00-07:00", lat: 37.794674, lon: -122.268395 },
      { id: "09-020061", code: "Na", date: "2009-03-19T18:37:00-07:00", lat: 37.813425, lon: -122.246316 },
      { id: "09-020222", code: "Th", date: "2009-03-19T18:30:00-07:00", lat: 37.81482, lon: -122.303549 },
      { id: "09-900804", code: "Th", date: "2009-03-19T18:30:00-07:00", lat: 37.795803, lon: -122.27804 },
      { id: "09-020055", code: "Na", date: "2009-03-19T18:10:00-07:00", lat: 37.776112, lon: -122.224313 },
      { id: "09-019849", code: "VT", date: "2009-03-19T18:09:00-07:00", lat: 37.79293, lon: -122.220035 },
      { id: "09-020049", code: "Na", date: "2009-03-19T17:57:00-07:00", lat: 37.81493, lon: -122.281885 },
      { id: "09-020036", code: "VT", date: "2009-03-19T17:26:00-07:00", lat: 37.823762, lon: -122.26205 },
      { id: "09-020041", code: "Th", date: "2009-03-19T17:14:00-07:00", lat: 37.765392, lon: -122.209532 },
      { id: "09-020041", code: "VT", date: "2009-03-19T17:14:00-07:00", lat: 37.765392, lon: -122.209532 },
      { id: "09-020039", code: "Ro", date: "2009-03-19T17:01:00-07:00", lat: 37.825218, lon: -122.289489 },
      { id: "09-020314", code: "VT", date: "2009-03-19T17:00:00-07:00", lat: 37.831949, lon: -122.251489 },
      { id: "09-020043", code: "SA", date: "2009-03-19T16:32:00-07:00", lat: 37.762943, lon: -122.194377 },
      { id: "09-020171", code: "SA", date: "2009-03-19T16:30:00-07:00", lat: 37.817921, lon: -122.283138 },
      { id: "09-020300", code: "SA", date: "2009-03-19T16:30:00-07:00", lat: 37.796771, lon: -122.241654 },
      { id: "09-020025", code: "DP", date: "2009-03-19T16:30:00-07:00", lat: 37.773631, lon: -122.201573 },
      { id: "09-020025", code: "DP", date: "2009-03-19T16:30:00-07:00", lat: 37.773631, lon: -122.201573 },
      { id: "09-900802", code: "Th", date: "2009-03-19T15:45:00-07:00", lat: 37.806355, lon: -122.241939 },
      { id: "09-020009-001", code: "Na", date: "2009-03-19T15:34:00-07:00", lat: 37.7858, lon: -122.22895 },
      { id: "09-020019", code: "DP", date: "2009-03-19T15:05:00-07:00", lat: 37.773631, lon: -122.201573 },
      { id: "09-020019", code: "SA", date: "2009-03-19T15:05:00-07:00", lat: 37.773631, lon: -122.201573 },
      { id: "09-020136", code: "VT", date: "2009-03-19T15:00:00-07:00", lat: 37.786926, lon: -122.194319 },
      { id: "09-019992", code: "Na", date: "2009-03-19T14:30:00-07:00", lat: 37.760961, lon: -122.1691 },
      { id: "09-019992", code: "Na", date: "2009-03-19T14:30:00-07:00", lat: 37.760961, lon: -122.1691 },
      { id: "09-019992", code: "Na", date: "2009-03-19T14:30:00-07:00", lat: 37.760961, lon: -122.1691 },
      { id: "09-019990", code: "SA", date: "2009-03-19T14:00:00-07:00", lat: 37.82806, lon: -122.288024 },
      { id: "09-020057", code: "Na", date: "2009-03-19T14:00:00-07:00", lat: 37.784639, lon: -122.230055 },
      { id: "09-020231", code: "Th", date: "2009-03-19T14:00:00-07:00", lat: 37.754784, lon: -122.190039 },
      { id: "09-900762", code: "Th", date: "2009-03-19T13:30:00-07:00", lat: 37.835215, lon: -122.264012 },
      { id: "09-019973", code: "VT", date: "2009-03-19T13:30:00-07:00", lat: 37.747425, lon: -122.184129 },
      { id: "09-020008", code: "SA", date: "2009-03-19T13:00:00-07:00", lat: 37.809363, lon: -122.280039 },
      { id: "09-019969", code: "SA", date: "2009-03-19T12:50:00-07:00", lat: 37.765652, lon: -122.182546 },
      { id: "09-019631", code: "VT", date: "2009-03-19T11:50:00-07:00", lat: 37.759005, lon: -122.192905 },
      { id: "09-020080", code: "Bu", date: "2009-03-19T11:00:00-07:00", lat: 37.845571, lon: -122.258725 },
      { id: "09-020223", code: "SA", date: "2009-03-19T11:00:00-07:00", lat: 37.738462, lon: -122.170121 },
      { id: "09-019930", code: "Va", date: "2009-03-19T10:00:00-07:00", lat: 37.768257, lon: -122.170756 },
      { id: "09-019907", code: "Na", date: "2009-03-19T09:50:00-07:00", lat: 37.765619, lon: -122.200604 },
      { id: "09-019911", code: "Th", date: "2009-03-19T09:40:00-07:00", lat: 37.742894, lon: -122.162878 },
      { id: "09-019898", code: "AA", date: "2009-03-19T09:00:00-07:00", lat: 37.784953, lon: -122.23441 },
      { id: "09-020085", code: "Bu", date: "2009-03-19T09:00:00-07:00", lat: 37.739088, lon: -122.170496 },
      { id: "09-020059", code: "Bu", date: "2009-03-19T08:30:00-07:00", lat: 37.773896, lon: -122.191201 },
      { id: "09-019965", code: "VT", date: "2009-03-19T08:00:00-07:00", lat: 37.831309, lon: -122.268057 },
      { id: "09-020134", code: "Bu", date: "2009-03-19T08:00:00-07:00", lat: 37.77408, lon: -122.19823 },
      { id: "09-019876", code: "VT", date: "2009-03-19T07:30:00-07:00", lat: 37.843787, lon: -122.283919 },
      { id: "09-020006", code: "VT", date: "2009-03-19T07:00:00-07:00", lat: 37.815309, lon: -122.263286 },
      { id: "09-020056", code: "Th", date: "2009-03-19T07:00:00-07:00", lat: 37.80376, lon: -122.278941 },
      { id: "09-019918", code: "Th", date: "2009-03-19T07:00:00-07:00", lat: 37.775419, lon: -122.203087 },
      { id: "09-019865", code: "AA", date: "2009-03-19T03:26:00-07:00", lat: 37.744389, lon: -122.170432 },
      { id: "09-019267", code: "Bu", date: "2009-03-19T03:00:00-07:00", lat: 37.808865, lon: -122.250447 },
      { id: "09-019851", code: "Va", date: "2009-03-19T02:15:00-07:00", lat: 37.797145, lon: -122.248744 },
      { id: "09-019864", code: "Ar", date: "2009-03-19T02:00:00-07:00", lat: 37.824303, lon: -122.26982 },
      { id: "09-019841", code: "Ar", date: "2009-03-19T01:08:00-07:00", lat: 37.812586, lon: -122.276387 },
      { id: "09-019844", code: "Bu", date: "2009-03-19T01:00:00-07:00", lat: 37.81091, lon: -122.243504 },
      { id: "09-900765", code: "Th", date: "2009-03-19T00:40:00-07:00", lat: 37.817669, lon: -122.269134 },
      { id: "09-019837", code: "AA", date: "2009-03-19T00:40:00-07:00", lat: 37.757021, lon: -122.186461 },
      { id: "09-016746-001", code: "VT", date: "2009-03-19T00:33:00-07:00", lat: 37.817926, lon: -122.258299 },
      { id: "09-019884-001", code: "VT", date: "2009-03-19T00:30:00-07:00", lat: 37.741102, lon: -122.157444 },
      { id: "09-019963", code: "Th", date: "2009-03-19T00:00:00-07:00", lat: 37.800563, lon: -122.273546 },
      { id: "09-019921", code: "Bu", date: "2009-03-19T00:00:00-07:00", lat: 37.786957, lon: -122.207692 },
      { id: "09-019980", code: "DP", date: "2009-03-19T00:00:00-07:00", lat: 37.786792, lon: -122.23581 }
    ];

    var codes = [
      { code: "AA", name: "Aggravated Assault", category: "violent" },
      { code: "Mu", name: "Murder", category: "violent" },
      { code: "Ro", name: "Robbery", category: "violent" },
      { code: "SA", name: "Simple Assault", category: "violent" },
      { code: "Ar", name: "Arson", category: "property" },
      { code: "Bu", name: "Burglary", category: "property" },
      { code: "Th", name: "Theft", category: "property" },
      { code: "Va", name: "Vandalism", category: "property" },
      { code: "VT", name: "Vehicle Theft", category: "property" },
      { code: "Al", name: "Alcohol", category: "quality" },
      { code: "DP", name: "Disturbing the Peace", category: "quality" },
      { code: "Na", name: "Narcotics", category: "quality" },
      { code: "Pr", name: "Prostitution", category: "quality" }
    ];
    var crimes = [
      { id: "09-900792", code: "Th", date: "2009-03-20T00:00:00-07:00", lat: 37.845066, lon: -122.259251 },
      { id: "09-020138", code: "SA", date: "2009-03-20T00:00:00-07:00", lat: 37.801396, lon: -122.279043 },
      { id: "09-900795", code: "Th", date: "2009-03-20T00:00:00-07:00", lat: 37.776394, lon: -122.160752 },
      { id: "09-020618", code: "Bu", date: "2009-03-20T00:00:00-07:00", lat: 37.739572, lon: -122.153254 },
      { id: "09-020141", code: "Va", date: "2009-03-19T23:30:00-07:00", lat: 37.810612, lon: -122.283648 },
      { id: "09-020124", code: "SA", date: "2009-03-19T23:09:00-07:00", lat: 37.804087, lon: -122.271248 },
      { id: "09-020170", code: "Ro", date: "2009-03-19T23:00:00-07:00", lat: 37.771985, lon: -122.148367 },
      { id: "09-020118", code: "SA", date: "2009-03-19T22:30:00-07:00", lat: 37.82387, lon: -122.257414 },
      { id: "09-900806", code: "Th", date: "2009-03-19T22:30:00-07:00", lat: 37.812051, lon: -122.207804 },
      { id: "09-020088", code: "SA", date: "2009-03-19T22:20:00-07:00", lat: 37.806634, lon: -122.287244 },
      { id: "09-020126", code: "VT", date: "2009-03-19T22:15:00-07:00", lat: 37.728821, lon: -122.17316 },
      { id: "09-020435", code: "SA", date: "2009-03-19T21:45:00-07:00", lat: 37.757602, lon: -122.186953 },
      { id: "09-020112", code: "SA", date: "2009-03-19T21:41:00-07:00", lat: 37.78495, lon: -122.223304 },
      { id: "09-020103", code: "Ro", date: "2009-03-19T21:40:00-07:00", lat: 37.806111, lon: -122.25943 },
      { id: "09-020116", code: "AA", date: "2009-03-19T21:30:00-07:00", lat: 37.806263, lon: -122.27445 },
      { id: "09-020110-005", code: "AA", date: "2009-03-19T21:30:00-07:00", lat: 37.803965, lon: -122.263631 },
      { id: "09-020110-005", code: "Ro", date: "2009-03-19T21:30:00-07:00", lat: 37.803965, lon: -122.263631 },
      { id: "09-020111", code: "Ro", date: "2009-03-19T21:23:00-07:00", lat: 37.805855, lon: -122.239903 },
      { id: "09-900807", code: "Th", date: "2009-03-19T21:15:00-07:00", lat: 37.811995, lon: -122.205404 },
      { id: "09-020228", code: "Th", date: "2009-03-19T21:00:00-07:00", lat: 37.814464, lon: -122.264771 },
      { id: "09-900798", code: "Th", date: "2009-03-19T21:00:00-07:00", lat: 37.807515, lon: -122.194519 },
      { id: "09-900803", code: "Th", date: "2009-03-19T21:00:00-07:00", lat: 37.801198, lon: -122.21127 },
      { id: "09-020114", code: "VT", date: "2009-03-19T20:00:00-07:00", lat: 37.748443, lon: -122.175958 },
      { id: "09-020083", code: "SA", date: "2009-03-19T19:55:00-07:00", lat: 37.730081, lon: -122.180221 },
      { id: "09-020086", code: "Th", date: "2009-03-19T19:41:00-07:00", lat: 37.83699, lon: -122.262284 },
      { id: "09-020089", code: "Ro", date: "2009-03-19T19:40:00-07:00", lat: 37.847448, lon: -122.247897 },
      { id: "09-020186", code: "Bu", date: "2009-03-19T19:30:00-07:00", lat: 37.835648, lon: -122.255492 },
      { id: "09-020247", code: "VT", date: "2009-03-19T19:30:00-07:00", lat: 37.825067, lon: -122.247883 },
      { id: "09-020070", code: "Ro", date: "2009-03-19T19:20:00-07:00", lat: 37.807276, lon: -122.295423 },
      { id: "09-020071", code: "Th", date: "2009-03-19T19:10:00-07:00", lat: 37.828231, lon: -122.287191 },
      { id: "09-020275", code: "VT", date: "2009-03-19T18:45:00-07:00", lat: 37.794674, lon: -122.268395 },
      { id: "09-020061", code: "Na", date: "2009-03-19T18:37:00-07:00", lat: 37.813425, lon: -122.246316 },
      { id: "09-020222", code: "Th", date: "2009-03-19T18:30:00-07:00", lat: 37.81482, lon: -122.303549 },
      { id: "09-900804", code: "Th", date: "2009-03-19T18:30:00-07:00", lat: 37.795803, lon: -122.27804 },
      { id: "09-020055", code: "Na", date: "2009-03-19T18:10:00-07:00", lat: 37.776112, lon: -122.224313 },
      { id: "09-019849", code: "VT", date: "2009-03-19T18:09:00-07:00", lat: 37.79293, lon: -122.220035 },
      { id: "09-020049", code: "Na", date: "2009-03-19T17:57:00-07:00", lat: 37.81493, lon: -122.281885 },
      { id: "09-020036", code: "VT", date: "2009-03-19T17:26:00-07:00", lat: 37.823762, lon: -122.26205 },
      { id: "09-020041", code: "Th", date: "2009-03-19T17:14:00-07:00", lat: 37.765392, lon: -122.209532 },
      { id: "09-020041", code: "VT", date: "2009-03-19T17:14:00-07:00", lat: 37.765392, lon: -122.209532 },
      { id: "09-020039", code: "Ro", date: "2009-03-19T17:01:00-07:00", lat: 37.825218, lon: -122.289489 },
      { id: "09-020314", code: "VT", date: "2009-03-19T17:00:00-07:00", lat: 37.831949, lon: -122.251489 },
      { id: "09-020043", code: "SA", date: "2009-03-19T16:32:00-07:00", lat: 37.762943, lon: -122.194377 },
      { id: "09-020171", code: "SA", date: "2009-03-19T16:30:00-07:00", lat: 37.817921, lon: -122.283138 },
      { id: "09-020300", code: "SA", date: "2009-03-19T16:30:00-07:00", lat: 37.796771, lon: -122.241654 },
      { id: "09-020025", code: "DP", date: "2009-03-19T16:30:00-07:00", lat: 37.773631, lon: -122.201573 },
      { id: "09-020025", code: "DP", date: "2009-03-19T16:30:00-07:00", lat: 37.773631, lon: -122.201573 },
      { id: "09-900802", code: "Th", date: "2009-03-19T15:45:00-07:00", lat: 37.806355, lon: -122.241939 },
      { id: "09-020009-001", code: "Na", date: "2009-03-19T15:34:00-07:00", lat: 37.7858, lon: -122.22895 },
      { id: "09-020019", code: "DP", date: "2009-03-19T15:05:00-07:00", lat: 37.773631, lon: -122.201573 },
      { id: "09-020019", code: "SA", date: "2009-03-19T15:05:00-07:00", lat: 37.773631, lon: -122.201573 },
      { id: "09-020136", code: "VT", date: "2009-03-19T15:00:00-07:00", lat: 37.786926, lon: -122.194319 },
      { id: "09-019992", code: "Na", date: "2009-03-19T14:30:00-07:00", lat: 37.760961, lon: -122.1691 },
      { id: "09-019992", code: "Na", date: "2009-03-19T14:30:00-07:00", lat: 37.760961, lon: -122.1691 },
      { id: "09-019992", code: "Na", date: "2009-03-19T14:30:00-07:00", lat: 37.760961, lon: -122.1691 },
      { id: "09-019990", code: "SA", date: "2009-03-19T14:00:00-07:00", lat: 37.82806, lon: -122.288024 },
      { id: "09-020057", code: "Na", date: "2009-03-19T14:00:00-07:00", lat: 37.784639, lon: -122.230055 },
      { id: "09-020231", code: "Th", date: "2009-03-19T14:00:00-07:00", lat: 37.754784, lon: -122.190039 },
      { id: "09-900762", code: "Th", date: "2009-03-19T13:30:00-07:00", lat: 37.835215, lon: -122.264012 },
      { id: "09-019973", code: "VT", date: "2009-03-19T13:30:00-07:00", lat: 37.747425, lon: -122.184129 },
      { id: "09-020008", code: "SA", date: "2009-03-19T13:00:00-07:00", lat: 37.809363, lon: -122.280039 },
      { id: "09-019969", code: "SA", date: "2009-03-19T12:50:00-07:00", lat: 37.765652, lon: -122.182546 },
      { id: "09-019631", code: "VT", date: "2009-03-19T11:50:00-07:00", lat: 37.759005, lon: -122.192905 },
      { id: "09-020080", code: "Bu", date: "2009-03-19T11:00:00-07:00", lat: 37.845571, lon: -122.258725 },
      { id: "09-020223", code: "SA", date: "2009-03-19T11:00:00-07:00", lat: 37.738462, lon: -122.170121 },
      { id: "09-019930", code: "Va", date: "2009-03-19T10:00:00-07:00", lat: 37.768257, lon: -122.170756 },
      { id: "09-019907", code: "Na", date: "2009-03-19T09:50:00-07:00", lat: 37.765619, lon: -122.200604 },
      { id: "09-019911", code: "Th", date: "2009-03-19T09:40:00-07:00", lat: 37.742894, lon: -122.162878 },
      { id: "09-019898", code: "AA", date: "2009-03-19T09:00:00-07:00", lat: 37.784953, lon: -122.23441 },
      { id: "09-020085", code: "Bu", date: "2009-03-19T09:00:00-07:00", lat: 37.739088, lon: -122.170496 },
      { id: "09-020059", code: "Bu", date: "2009-03-19T08:30:00-07:00", lat: 37.773896, lon: -122.191201 },
      { id: "09-019965", code: "VT", date: "2009-03-19T08:00:00-07:00", lat: 37.831309, lon: -122.268057 },
      { id: "09-020134", code: "Bu", date: "2009-03-19T08:00:00-07:00", lat: 37.77408, lon: -122.19823 },
      { id: "09-019876", code: "VT", date: "2009-03-19T07:30:00-07:00", lat: 37.843787, lon: -122.283919 },
      { id: "09-020006", code: "VT", date: "2009-03-19T07:00:00-07:00", lat: 37.815309, lon: -122.263286 },
      { id: "09-020056", code: "Th", date: "2009-03-19T07:00:00-07:00", lat: 37.80376, lon: -122.278941 },
      { id: "09-019918", code: "Th", date: "2009-03-19T07:00:00-07:00", lat: 37.775419, lon: -122.203087 },
      { id: "09-019865", code: "AA", date: "2009-03-19T03:26:00-07:00", lat: 37.744389, lon: -122.170432 },
      { id: "09-019267", code: "Bu", date: "2009-03-19T03:00:00-07:00", lat: 37.808865, lon: -122.250447 },
      { id: "09-019851", code: "Va", date: "2009-03-19T02:15:00-07:00", lat: 37.797145, lon: -122.248744 },
      { id: "09-019864", code: "Ar", date: "2009-03-19T02:00:00-07:00", lat: 37.824303, lon: -122.26982 },
      { id: "09-019841", code: "Ar", date: "2009-03-19T01:08:00-07:00", lat: 37.812586, lon: -122.276387 },
      { id: "09-019844", code: "Bu", date: "2009-03-19T01:00:00-07:00", lat: 37.81091, lon: -122.243504 },
      { id: "09-900765", code: "Th", date: "2009-03-19T00:40:00-07:00", lat: 37.817669, lon: -122.269134 },
      { id: "09-019837", code: "AA", date: "2009-03-19T00:40:00-07:00", lat: 37.757021, lon: -122.186461 },
      { id: "09-016746-001", code: "VT", date: "2009-03-19T00:33:00-07:00", lat: 37.817926, lon: -122.258299 },
      { id: "09-019884-001", code: "VT", date: "2009-03-19T00:30:00-07:00", lat: 37.741102, lon: -122.157444 },
      { id: "09-019963", code: "Th", date: "2009-03-19T00:00:00-07:00", lat: 37.800563, lon: -122.273546 },
      { id: "09-019921", code: "Bu", date: "2009-03-19T00:00:00-07:00", lat: 37.786957, lon: -122.207692 },
      { id: "09-019980", code: "DP", date: "2009-03-19T00:00:00-07:00", lat: 37.786792, lon: -122.23581 }
    ];

    var codes = [
      { code: "AA", name: "Aggravated Assault", category: "violent" },
      { code: "Mu", name: "Murder", category: "violent" },
      { code: "Ro", name: "Robbery", category: "violent" },
      { code: "SA", name: "Simple Assault", category: "violent" },
      { code: "Ar", name: "Arson", category: "property" },
      { code: "Bu", name: "Burglary", category: "property" },
      { code: "Th", name: "Theft", category: "property" },
      { code: "Va", name: "Vandalism", category: "property" },
      { code: "VT", name: "Vehicle Theft", category: "property" },
      { code: "Al", name: "Alcohol", category: "quality" },
      { code: "DP", name: "Disturbing the Peace", category: "quality" },
      { code: "Na", name: "Narcotics", category: "quality" },
      { code: "Pr", name: "Prostitution", category: "quality" }
    ];


    var colors = {
      violent: { light: "rgba(217, 0, 0, .8)", dark: "rgb(163, 0, 0)" },
      property: { light: "rgba(35, 150, 94, .8)", dark: "rgb(26, 112, 70)" },
      quality: { light: "rgba(52, 137, 186, .8)", dark: "rgb(39, 103, 139)" },
    };

    codes.forEach(function(x) colors[x.code] = colors[x.category]);

    function Canvas(crimes) {
      this.crimes = crimes;
    }

    Canvas.prototype = pv.extend(GOverlay);

    Canvas.prototype.initialize = function(map) {
      this.map = map;
      this.canvas = document.createElement("div");
      this.canvas.setAttribute("class", "canvas");
      map.getPane(G_MAP_MAP_PANE).parentNode.appendChild(this.canvas);
    };

    Canvas.prototype.redraw = function(force) {
      if (!force) return;
      var c = this.canvas, m = this.map, r = 20;

      /* Get the pixel locations of the crimes. */
      var pixels = this.crimes.map(function(d) {
          return m.fromLatLngToDivPixel(new GLatLng(d.lat, d.lon));
        });

      /* Update the canvas bounds. Note: may be large. */
      function x(p) p.x; function y(p) p.y;
      var x = { min: pv.min(pixels, x) - r, max: pv.max(pixels, x) + r };
      var y = { min: pv.min(pixels, y) - r, max: pv.max(pixels, y) + r };
      c.style.width = (x.max - x.min) + "px";
      c.style.height = (y.max - y.min) + "px";
      c.style.left = x.min + "px";
      c.style.top = y.min + "px";

      /* Render the visualization. */
      new pv.Panel()
          .canvas(c)
          .left(-x.min)
          .top(-y.min)
        .add(pv.Panel)
          .data(this.crimes)
        .add(pv.Dot)
          .left(function() pixels[this.parent.index].x)
          .top(function() pixels[this.parent.index].y)
          .strokeStyle(function(x, d) colors[d.code].dark)
          .fillStyle(function(x, d) colors[d.code].light)
          .size(140)
        .anchor("center").add(pv.Label)
          .textStyle("white")
          .text(function(x, d) d.code)
        .root.render();
    };

    /* Restrict minimum and maximum zoom levels. */
    G_NORMAL_MAP.getMinimumResolution = function() 11;
    G_NORMAL_MAP.getMaximumResolution = function() 14;

    var map = new GMap2(document.getElementById("map"));
    map.setCenter(new GLatLng(37.78, -122.22), 12);
    map.setUI(map.getDefaultUI());
    map.addOverlay(new Canvas(crimes));
    
    </script>
  </head>
  <body onunload="GUnload()">
    <div id="map"></div>
  </body>
</html>