using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using System;
using UnityEngine.Networking;

public class ItemDataManager : MonoBehaviour {

    public GameObject m_TorchPrefab;
    public List<SequenceData> m_ItemList;
    public SwitchManager m_SwitchManager;

	void Start () {
        GetJsonFromWww();
	}
	
	public void GetJsonFromWww()
    {
        string sTgtURL = "http://localhost/torch/item/getItems";

        StartCoroutine(GetItems(sTgtURL, CallbackWwwSuccess, CallbackWwwFailed));
    }

    public void CallbackWwwSuccess(string response)
    {
        //jsonデータ取得が成功したのでデシリアライズして整形しSwitchManagerに引き渡す
        List<SequenceData> sequenceList = ItemDataModel.DeserializeFromJson(response);

        Debug.Log("取得成功しました。");
        Debug.Log(sequenceList);

        m_SwitchManager.SetGhost(sequenceList);
    }

    public void CallbackWwwFailed()
    {
        //jsonデータ取得に失敗した
        Debug.Log("取得失敗しました。");
    }

    public IEnumerator GetItems(string sTgtURL, Action<string> cbkSuccess = null, Action cbkFailed = null)
    {
        //WWWを利用してリクエストを送る
        WWW www = new WWW(sTgtURL);

        //WWWレスポンス待ち
        yield return StartCoroutine(ResponseCheckForTimeOutWWW(www, 5.0f));

        if (www.error != null)
        {
            //レスポンスエラーの場合
            Debug.LogError(www.error);
            if(null != cbkFailed)
            {
                cbkFailed();
            }
        }
        else if (www.isDone)
        {
            //リクエスト成功の場合
            Debug.Log(string.Format("Success:{0}", www.text));
            if(null != cbkSuccess)
            {
                cbkSuccess(www.text);
            }
        }
    }

    public IEnumerator ResponseCheckForTimeOutWWW(WWW www, float timeout)
    {
        float requestTime = Time.time;

        while (!www.isDone)
        {
            if(Time.time - requestTime < timeout)
            {
                yield return null;
            }
            else
            {
                Debug.LogWarning("TimeOut"); //タイムアウト
                break;
            }
        }
        yield return null;
    }

    public void spawnItems(List<SequenceData> SequenceDataList, List<Transform> SwitchChildList)
    {
        int seqNumber = 0;
        GameObject obj = null;
        foreach(SequenceData Sequence in SequenceDataList)
        {
            foreach(ItemData Item in Sequence.itemList)
            {
                if (Item.itemType == 1) //itemTypeがtorchの場合
                {
                    Vector3 sItemCoodinate = new Vector3(Item.itemXCoordinate, Item.itemYCoordinate, Item.itemZCoordinate);

                    //DBから得たアイテムの座標にTorchプレハブをインスタンス化
                    obj = (GameObject)Instantiate(m_TorchPrefab, sItemCoodinate, Quaternion.identity);

                    //switch下torchをまとめたオブジェクトの子オブジェクトにする
                    obj.transform.parent = SwitchChildList[seqNumber];

                }
            }
            SwitchChildList[seqNumber].gameObject.SetActive(false); 
            seqNumber++;
        }
    }


    public void UploadItemData(string userName)
    {
        string sTgtURL = "http://localhost/torch/item/setItem/";

        StartCoroutine(SetItems(sTgtURL, userName));
    }

    public IEnumerator SetItems(string urlTarget, string userName)
    {
        WWWForm form = new WWWForm();
        form.AddField("name", userName);
        form.AddField("totalSeq", PlayerPrefs.GetInt("sequenceId", 0));
        form.AddField("seq1", PlayerPrefs.GetString("seq1", null));
        form.AddField("seq2", PlayerPrefs.GetString("seq2", null));
        form.AddField("seq3", PlayerPrefs.GetString("seq3", null));
        form.AddField("seq4", PlayerPrefs.GetString("seq4", null));
        form.AddField("seq5", PlayerPrefs.GetString("seq5", null));

        Debug.Log(PlayerPrefs.GetString("seq1", null));

        WWW www = new WWW(urlTarget, form);

        yield return StartCoroutine(ResponseCheckForTimeOutWWW(www, 5.0f));

        if(www.error != null)
        {
            //レスポンスエラー
            Debug.LogError(www.error);
            Debug.Log("送信失敗");
        }
        else if(www.isDone)
        {
            //リクエスト成功
            Debug.Log(string.Format("Success:{0}", www.text));
            Debug.Log("送信完了");
        }
    }

}
