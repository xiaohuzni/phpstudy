<%@ page language="java" contentType="text/html; charset=utf-8"
    pageEncoding="utf-8"%>
    <%@taglib prefix="s" uri="/struts-tags" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Insert title here</title>
</head>
<body>
	<s:form action="register.action" method="post">
		<div><input type="text" name="username"/></div>
		<div><input type="text" name="age"/></div>
		<div><input type="text" name="date"/></div>
		<div><input type="submit" value="提交"/></div>
	</s:form>
</body>
</html>