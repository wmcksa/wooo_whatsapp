@extends('crudbooster::admin_template')
@section('content')
    <!-- Your html goes here -->
    <div class='panel panel-default'>
        <div class='panel-heading'>documentation</div>
        <div class='panel-body'>
            = <div class='form-group'>
                <div for="" class=" col-sm-12" style="
          text-align: left;
      ">

                    <div class="sc-fzpkJw gEiHfF">
                        <div class="sc-fzpans eHubdg">
                            <h1>POST
                                Send Message</h1>
                            <p><span>Send a message to someone or group. Expect the below JSON object shape:</span></p>

                            <div style="
                            background: whitesmoke;
                        ">http://localhost:3000/:sessionId/messages/send
                            </div>
                            <span>
                            </span>
                            <div class="sc-AxirZ iQbPHz">
                                <div class="sc-AxheI cWvcsp highlighted-code--documentation">
                                    <div class="sc-Axmtr rytkq">
                                        <div class="sc-AxmLO gFCZqq highlighted-code__language-label">json</div>
                                        <div class="sc-fzozJi gQbNdh"></div>
                                    </div>
                                    <div class="sc-fzoLsD fYZyZu">
                                        <div data-entity-type="code-block" class="sc-AxhCb hxwxfk">
                                            <div class="sc-AxgMl gpbYHG highlight-code">
                                                <pre class="language-json"><code class="language-json highlighted-code__code"><span class="token punctuation">{</span>
              <span class="token string-property property">"jid"</span><span class="token operator">:</span> <span class="token string">"966560896483@s.whatsapp.net"</span><span class="token punctuation">,</span> <span class="token comment">// Target jid</span>
              <span class="token string-property property">"type"</span><span class="token operator">:</span> <span class="token string">"number"</span><span class="token punctuation">,</span> <span class="token comment">// Use "number" for number jid, or "group" for group jid</span>
              <span class="token string-property property">"message"</span><span class="token operator">:</span> <span class="token punctuation">{</span>
                <span class="token string-property property">"text"</span><span class="token operator">:</span> <span class="token string">"Hello!"</span>
              <span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token comment">// `AnyMessageContent`</span>
              <span class="token string-property property">"options"</span><span class="token operator">:</span> <span class="token punctuation">{</span><span class="token punctuation">}</span> <span class="token comment">// Optional `MiscMessageGenerationOptions`, eg: to quote message, etc</span>
            <span class="token punctuation">}</span></code></pre>
                                            </div>

                                            <img src="{{ asset('image/134.png') }}" alt="" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div><span>
                            </span>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                </div>

            </div>

        </div>
        </form>
    </div>
    <div class='panel-footer'>
    </div>
    </div>
@endsection
