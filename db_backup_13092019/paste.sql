INSERT INTO `paste` VALUES ('0066Vw4NqUa7mDlGnABC5Yx0', '[Tài liệu] Phân tích và thiết kế thuật toán', 'Lưu trữ drive. Tài liệu', '<a href=\"https://drive.google.com/open?id=1fnQ4CIbYBx7FLpv_Pu4Eya-byc2d2MJn\">Tải xuống</a>', 'chutich', 'text/html', '03:11:10 03-03-2019', 'Tài liệu, thuat toan', 'tai-lieu-phan-tich-va-thiet-ke-thuat-toan', 287);
INSERT INTO `paste` VALUES ('15517468824953sfX5xpqDz17Nc6aUgJ4', 'Tài liệu lập trình android FPT', 'Lưu trữ drive', '<a href=\"https://drive.google.com/file/d/0B4fU5__VXkIkd2FwQkxmbmN5bnM/edit\">Tải xuống</a>', 'unknow', 'text/html', '07:48:02 05-03-2019', 'FPT, Android', 'tai-lieu-lap-trinh-android-fpt', 259);
INSERT INTO `paste` VALUES ('1551747929632XvwxUDn60bNRZfhWABO3', '[Khóa học] Angular 5. Tiếng Việt', 'Lưu trữ FShare. Khóa học dạng video', '<a href=\"https://www.fshare.vn/file/VYVBKNDI773J?token=1551747817\">Tải xuống</a>', 'unknow', 'text/html', '08:05:30 05-03-2019', 'angular, js', 'khoa-hoc-angular-5-tieng-viet', 26);
INSERT INTO `paste` VALUES ('1551750134283Qvx8RcjJX9sMbYanG2op', '[Tài liệu] Lập trình winform C# - FPT', 'Lưu trữ FShare., pass: bachkhoaaptech.com', '<a href=\"https://www.fshare.vn/folder/VNRC4N\">Tải xuống (Không quảng cáo)</a>', 'unknow', 'text/html', '08:42:14 05-03-2019', 'fpt, fshare', 'tai-lieu-lap-trinh-winform-c-fpt', 55);
INSERT INTO `paste` VALUES ('15517547154110MuDTJacyO54dip8kqrl', '[Tài liệu] Lập trình PHP ĐH KHTN', 'Lưu trữ google drive.', '<a href=\"https://drive.google.com/file/d/0B8K7xPexgNemZEhEV1pZS2JMWE0/edit\">Tải xuống</a>', 'unknow', 'text/html', '09:58:36 05-03-2019', 'php, fpt', 'tai-lieu-lap-trinh-php-dh-khtn', 34);
INSERT INTO `paste` VALUES ('1551754846766VJ7FXPN8Ha1E05DzjmWL', '[Tài liệu] Slide lập trình php fpt', 'slide php, dạng hình ảnh.', '<a href=\"http://www.slideshare.net/slideshow/embed_code/34529684\">Tải xuosng</a>', 'unknow', 'text/html', '10:00:47 05-03-2019', 'php. fpt', 'tai-lieu-slide-lap-trinh-php-fpt', 31);
INSERT INTO `paste` VALUES ('1551807849780WiAj0V8OHKfuRtL21avl', 'Hàm tự  động tạo một chuỗi dạng URL php', 'Hàm này sẽ tự động tạo một string slug url dựa trên một chuỗi truyền vào thích hợp cho ai cần tạo url bài viết tự động', 'public function testSlugFn($string){\r\n	echo str_slug($string);\r\n}', 'vanthinhit310', 'text/x-php', '12:44:10 06-03-2019', 'php', 'ham-xu-dong-tao-mot-chuoi-dang-url-php', 110);
INSERT INTO `paste` VALUES ('1551956801253Hn2ZFaKtj4rwvsSk0W9U', 'Copying a Directory: Copies files under srcDir to dstDir, if dstDir does not exist, it will be created.', 'Copying a Directory: Copies files under srcDir to dstDir, if dstDir does not exist, it will be created.', 'import java.io.File;\r\nimport java.io.FileInputStream;\r\nimport java.io.FileOutputStream;\r\nimport java.io.IOException;\r\nimport java.io.InputStream;\r\nimport java.io.OutputStream;\r\n\r\npublic class Main {\r\n  public static void main(String[] argv) throws Exception {\r\n    copyDirectory(new File(\"c:\\\\\"), new File(\"d:\\\\\")) ;\r\n  }\r\n\r\n  public static void copyDirectory(File srcDir, File dstDir) throws IOException {\r\n    if (srcDir.isDirectory()) {\r\n      if (!dstDir.exists()) {\r\n        dstDir.mkdir();\r\n      }\r\n\r\n      String[] children = srcDir.list();\r\n      for (int i = 0; i < children.length; i++) {\r\n        copyDirectory(new File(srcDir, children[i]), new File(dstDir, children[i]));\r\n      }\r\n    } else {\r\n      copyFile(srcDir, dstDir);\r\n    }\r\n  }\r\n\r\n  public static void copyFile(File src, File dst) throws IOException {\r\n    InputStream in = new FileInputStream(src);\r\n    OutputStream out = new FileOutputStream(dst);\r\n\r\n    byte[] buf = new byte[1024];\r\n    int len;\r\n    while ((len = in.read(buf)) > 0) {\r\n      out.write(buf, 0, len);\r\n    }\r\n    in.close();\r\n    out.close();\r\n  }\r\n}', 'vanthinhit310', 'text/x-java', '06:06:41 07-03-2019', 'JavaFile, Input, Output,Directory', 'copying-a-directory-copies-files-under-srcdir-to-dstdir-if-dstdir-does-not-exist-it-will-be-created', 7);
INSERT INTO `paste` VALUES ('15523725980638cvskwYlgK24dCVrFEWb', '[Khóa học] IELTS cho người mới bắt đầu.', 'Lưu trữ drive, pass: codefulltime hoặc codefulltime.com', '<a href=\"https://drive.google.com/open?id=1hf-TA1V_2_mKWTeZclHYKMBqYMcHF5M6\">Tải xuống</a>', 'unknow', 'text/html', '01:36:38 12-03-2019', 'ielts, english', 'khoa-hoc-ielts-cho-nguoi-moi-bat-dau', 101);
INSERT INTO `paste` VALUES ('1552409852981ugN9FjMSm26xWhkbrVZv', '[Tài liệu] Khóa học Eng Breaking', 'GG drive.', '<a href=\"https://drive.google.com/open?id=1va7UaZxnDPsUtY9CHrnmnmNG9pOQao78\">Tải xuống</a>', 'unknow', 'text/html', '11:57:34 12-03-2019', 'Eng Breaking, english', 'tai-lieu-khoa-hoc-eng-breaking', 11);
INSERT INTO `paste` VALUES ('1552411184255jrLt5bFvK9ClcIEyPV7a', 'c', 'c', NULL, 'chien5572', 'text/x-csrc', '12:19:44 13-03-2019', 'met', 'c', 7);
INSERT INTO `paste` VALUES ('1552500062435ZoGcHAPbjakDtwMi8QNB', 'KHÓA HỌC LẬP TRÌNH JAVASCRIPT TRÊN UNICA.VN', 'Như các bạn biết khi học lập trình web nói chung và học về lập trình frontend nói riêng thì bắt buộc bạn phải học javascript, một website thiếu Javascript thì sẽ trở nên cọc cằn, chức năng không đẹp và không thân thiện với người dùng. vì vậy nếu bạn không học JS thì đó quả là một sai lầm và lạc hậu về công nghệ.', '<a target=\"_blank\" href=\"https://mshare.io/file/fIHz8x\">Dowload khóa học tại đây</a>', 'vanthinhit310', 'text/html', '01:01:02 14-03-2019', 'html, javascript, unica.vn, khóa học', 'khoa-hoc-lap-trinh-javascript-tren-unicavn', 7);
INSERT INTO `paste` VALUES ('1552826580520EirT0Dpvauk73zIMCPsn', 'Test markdown', 'Đây là test', 'hau\r\n==========================\r\n# test', 'unknow', 'markdown', '07:43:01 17-03-2019', 'test', 'test-markdown', 1);
INSERT INTO `paste` VALUES ('1552826674560XNernpH1z2i7admOxBqv', 'Test markdown 1', 'Đây là test', '`aa`', 'unknow', 'markdown', '07:44:34 17-03-2019', 'test', 'test-markdown-1', 1);
INSERT INTO `paste` VALUES ('2417im2JPtsEchgMSBvlqrek', 'Chiến lượt tài chính -TS Lê Thẩm Dương', '', '<a href=\"https://drive.google.com/file/d/14GV7-Vr9TVVtcSTcAwj_7nJ3f5v8dV-P/view\">Tải khóa học</a>', 'unknow', 'text/html', '05:56:14 02-03-2019', 'lethamduong', 'codefulltime-chien-luot-tai-chinh-lethamduong', 22);
INSERT INTO `paste` VALUES ('2866QpFZhxgv8fuozaItOKsj', 'Tạo động lực cho người khác tạo thành công cho chính mình', NULL, '<a href=\"https://drive.google.com/file/d/1mUYQ2so4zDSYQibA6GRDz99rLKX5u6xQ/view\">Tải khóa học</a>', 'unknow', 'text/html', '07:11:10 02-03-2019', NULL, 'tao-dong-luc-cho-nguoi-khac-tao-thanh-cong-cho-chinh-minh', 12);
INSERT INTO `paste` VALUES ('2899BWSC6phkELrK1YfeFTJs', 'Học thiết kế Website động với ASP.NET WebForm và SQL Server', 'File rar. Lưu trữ với Fshare', '<a href=\"https://www.fshare.vn/file/GOTSAQKBKN93\">Tải khóa học</a>', 'unknow', 'text/html', '07:16:37 02-03-2019', '.NET, ASP, SQL Server, Webform', 'thiet-ke-web-dong-voi-aspnet-webform-sqlserver', 15);
INSERT INTO `paste` VALUES ('2926pJnL50v7fZTtruQKm26E', 'Share khóa học Word của 1 website đào tạo online', 'Google drive', '<a href=\"https://drive.google.com/drive/folders/0BxWzdKuyBcavVFprY0MwRnpSVzg\">Tải khóa học</a>', 'unknow', 'text/html', '07:21:01 02-03-2019', 'word', 'share-khoa-hoc-word', 8);
INSERT INTO `paste` VALUES ('3063jc1zCuQ5fXmxTJpZyROw', 'Giáo trình Youtube năm 2018 của KS Dương Trung Hiếu V3', 'Lưu trữ với Mega', '<a href=\"https://mega.nz/#!LbInhYrA!nxqZgeYo46Omj0H2KY4W7Y1dlD400f0OHxRDq5M2ywE\">Tải khóa học</a>', 'unknow', 'text/html', '07:43:58 02-03-2019', NULL, 'giao-trinh-youtube-nam-2018-cua-ks-duong-trung-hieu-v3', 8);
INSERT INTO `paste` VALUES ('3108L2TxJvb6ZykHMPDUfQWV', 'Share khóa học Spring MVC của Chế Công Bình', NULL, '<a href=\"https://drive.google.com/drive/folders/1tGfNCl20ZMonvuPdge9J7AyyFrM_l3GX\">Tải khóa học</a>', 'unknow', 'text/html', '07:51:29 02-03-2019', 'Chế công bình, spring-mvc', 'share-khoa-hoc-spring-mvc-cua-che-cong-binh', 12);
INSERT INTO `paste` VALUES ('3217RPcFrY6JmNvqdASI1h2H', 'SubNumber in Java', NULL, 'import java.util.ArrayList;\r\nimport java.util.List;\r\n\r\npublic class SubNumber {\r\n	ArrayList<Integer> list = new ArrayList<Integer>();\r\n	List<Integer> list1 = new ArrayList<Integer>();\r\n	public One(int in) {\r\n		int soChuSo = SoChuSo(in);\r\n		int length = so', 'unknow', 'text/x-java', '08:09:40 02-03-2019', 'java, substring, number', 'subnumber-in-java', 15);
INSERT INTO `paste` VALUES ('3292NTkhsm70RtzjMIW8PvoX', 'Share Ebook kiếm tiền online của Unica', NULL, '<a href=\"https://drive.google.com/file/d/0BwDRsubFrsUIRkwyTTA3S1Roc0E/view\">Tải xuống</a>', 'unknow', 'text/html', '08:22:09 02-03-2019', NULL, 'share-ebook-kiem-tien-online-cua-unica', 5);
INSERT INTO `paste` VALUES ('33050N6euigsGV5DhAKkxjWR', 'Share Ebook 28 ngày để trở thành Youtuber trị giá 200K', NULL, '<a href=\"https://drive.google.com/file/d/0B0l4NoqR1yH7NzhuSDVpTEJZYWdMaktUalYtbExQT0FLOEVr/view\">Tải xuống</a>', 'unknow', 'text/html', '08:24:20 02-03-2019', NULL, 'share-ebook-28-ngay-de-tro-thanh-youtuber-tri-gia-200k', 10);
INSERT INTO `paste` VALUES ('3402ylqgs0d8D7Uf9KB3powi', 'Tài liệu học C# căn bản', 'File Pdf Tiếng anh', '<a href=\"https://drive.google.com/file/d/0B-t3Q1_XeuaOdXk4LTRQU1BGMWc/view\">Tải xuống</a>', 'unknow', 'text/html', '08:40:25 02-03-2019', NULL, 'tai-lieu-hoc-c-can-ban', 64);
INSERT INTO `paste` VALUES ('3444tNVapwOkJFAYWTSGsofK', 'Luyện thi chứng chỉ quốc tế ISTQB cho Tester', 'Lưu trữ drive', '<a href=\"https://drive.google.com/file/d/1h9_uZMDhSI1yQtkFXe69FMXiWI-CRRBl/view\">Tải xuống khóa học</a>', 'unknow', 'text/html', '08:47:28 02-03-2019', NULL, 'luyen-thi-chung-chi-quoc-te-istqb-cho-tester', 4);
INSERT INTO `paste` VALUES ('3454ACQwxU3iqegLR8movZW9', 'Excel ứng dụng cho kế toán và hành chính nhân sự', 'Lưu trữ drive', '<a href=\"https://drive.google.com/file/d/1lpO8kCcE8g8b8QQi_KdThwc41aK2uVb3/view\">Tải khóa học ngay</a>', 'unknow', 'text/html', '08:49:10 02-03-2019', 'excel, kế toán', 'excel-ung-dung-cho-ke-toan-va-hanh-chinh-nhan-su', 7);
INSERT INTO `paste` VALUES ('3899LVI6mehFuwtY8zclpDvP', 'Bài tập code fun', 'Dạng hình ảnh. Nguồn Cô N. ĐH Nông Lâm TPHCM', '<a href=\"https://www.dropbox.com/sh/bcxzuci840mvvpq/AAC_gqTk2nDdWcYdA_kLhwVxa?dl=0\">Tải xuống bài tập</a>', 'unknow', 'text/html', '10:03:12 02-03-2019', 'codefull, Nông Lâm, NLU', 'bai-tap-code-fun', 119);
INSERT INTO `paste` VALUES ('9029pbqUcr2P70oedN5v3hYZ', 'SMS Marketing căn bản', 'Lưu trữ drive', '<a href=\"https://drive.google.com/file/d/1ku_CwiGVgWYqwlcTesHIpiR6TG-jBzMO/view\">Tải xuống</a>', 'chutich', 'text/html', '12:18:14 03-03-2019', 'sms, marketing, basic', 'sms-marketing-can-ban', 3);
INSERT INTO `paste` VALUES ('9044MibIzOVaFu1Eg8Z37nL4', 'Tối ưu ứng dụng android thông qua app tải và nghe nhạc phần 1', 'Yêu cầu có android studio và kiến thức lập trình android cơ bản. Lưu trữ google drive', '<a href=\"https://drive.google.com/file/d/11M6SHwBtNu_5kj410HrXBHafSz91E7VT/view\">Tải xuống</a>', 'chutich', 'text/html', '12:20:45 03-03-2019', 'android studio, java', 'toi-uu-ung-dung-android-thong-qua-app-tai-va-nghe-nhac-phan-1', 13);
INSERT INTO `paste` VALUES ('9567WaLblKuoNMJCIt5p3Ggm', 'Học lập trình iOS qua 15 ứng dụng thực tế Phần 1', 'Lưu trữ drive', '<a href=\"https://drive.google.com/file/d/14nVjA5e3hL5tTlc46BHJnxwtjzjJa-Qg/view\">Tải xuống</a>', 'chutich', 'text/html', '01:47:55 03-03-2019', 'IOS, Swift', 'hoc-lap-trinh-ios-qua-15-ung-dung-thuc-te-phan-1', 7);
INSERT INTO `paste` VALUES ('9580R0pfcuVmalxJzAdyIeMS', 'Học lập trình iOS qua 15 ứng dụng thực tế Phần 3', 'Lưu trữ drive', '<a href=\"https://drive.google.com/file/d/17LV-YMc2rBQd4yiUZUV8jXWWeBu6MAOt/view\">Tải xuống</a>', 'chutich', 'text/html', '01:50:02 03-03-2019', 'IOS, Swift', 'hoc-lap-trinh-ios-qua-15-ung-dung-thuc-te-phan-3', 2);
INSERT INTO `paste` VALUES ('9586TMgKa0tG4cVR1B8yhzL3', 'Học lập trình iOS qua 15 ứng dụng thực tế Phần 4', 'Lưu trữ drive', '<a href=\"https://drive.google.com/file/d/1ZZbJebzF62Rpeiu5EEBkaBO5Z8wZytM0/view\">Tải xuống</a>', 'chutich', 'text/html', '01:51:08 03-03-2019', 'IOS, Swift', 'hoc-lap-trinh-ios-qua-15-ung-dung-thuc-te-phan-4', 5);
INSERT INTO `paste` VALUES ('9594VTaRE3Z8d60zfYSkX1mr', 'Học lập trình iOS qua 15 ứng dụng thực tế Phần 2', 'Lưu trữ drive', '<a href=\"https://drive.google.com/file/d/1jj1Q_ApgBfY9RlhB99bCYd7YpcivbCqj/view\">Tải xuống</a>', 'chutich', 'text/html', '01:52:26 03-03-2019', 'IOS, Swift', 'hoc-lap-trinh-ios-qua-15-ung-dung-thuc-te-phan-2', 4);
INSERT INTO `paste` VALUES ('9598XBfIOWzi9TrGyq4FPClk', 'Học lập trình iOS qua 15 ứng dụng thực tế Phần 5', 'Lưu trữ drive', '<a href=\"https://drive.google.com/file/d/14nVjA5e3hL5tTlc46BHJnxwtjzjJa-Qg/view\">Tải xuống</a>', 'chutich', 'text/html', '01:53:09 03-03-2019', 'IOS, Swift', 'hoc-lap-trinh-ios-qua-15-ung-dung-thuc-te-phan-5', 4);
INSERT INTO `paste` VALUES ('9607Zg1BwSyzW6PD9bFeXhEH', 'Tối ưu ứng dụng android thông qua app tải và nghe nhạc phần 2', 'Lưu trữ drive', '<a href=\"https://drive.google.com/file/d/1WBlMCQa7UAv9NtTyMlAkfvNq53dA60Cc/view\">Tải xuống</a>', 'chutich', 'text/html', '01:54:36 03-03-2019', 'android studio, java', 'toi-uu-ung-dung-android-thong-qua-app-tai-va-nghe-nhac-phan-2', 4);