<html><body>
    Welcome
    <% 
    For x = 1 to Request.Form.Count 
      Response.Write x & ": " _ 
        & Request.Form.Key(x) & "=" & Request.Form.Item(x) & "<BR>" 
    Next 
    %> 
</body></html>