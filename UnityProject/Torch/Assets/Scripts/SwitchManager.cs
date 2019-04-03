using System.Collections;
using System.Collections.Generic;
using System.Linq;
using UnityEngine;

public class SwitchManager : MonoBehaviour {

    public ItemDataManager m_ItemDataManager;
    public List<Transform> m_SwitchChildList = new List<Transform>();
    public Material m_NonActiveSwitchMaterial;

    private List<Transform> m_SwitchList = new List<Transform>();
   
	void Awake() {
        
        //すべてのSwitchオブジェクトをリストに入れる
        for(int i=0; i < transform.childCount; i++)
        {
            m_SwitchList.Add(transform.GetChild(i));
        }

        foreach (Transform switchOne in m_SwitchList)
        {
            m_SwitchChildList.Add(switchOne.GetChild(0).GetComponent<Transform>());
        }
	}

    private void Start()
    {
        foreach(Transform switchOne in m_SwitchList)
        {
            //colliderをオンにする
            switchOne.gameObject.GetComponent<MeshCollider>().enabled = true;
            //アクティブ時のMaterialに変更
            switchOne.gameObject.GetComponent<Renderer>().material = m_NonActiveSwitchMaterial;
        }
    }

    private void Update()
    {
    }


    //各スイッチにsequenceDataを振り分ける
    public void SetGhost(List<SequenceData> sequenceList)
    {
        for (int i = 0; i < sequenceList.Count(); i++)
        {
            if (i < m_SwitchList.Count())
            {
                SwitchController sSwitchController = m_SwitchList[i].GetComponent<SwitchController>();
                sSwitchController.m_itemList = sequenceList[i].itemList;
                Debug.Log("データをswitchに振り分けました");
            }
        } 
    }
}
